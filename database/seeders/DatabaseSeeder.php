<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Book;
use App\Models\Member;
use App\Models\Borrowing;
use App\Models\BookReturn;
use App\Models\BookCondition;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // 1. Categories
        $categories = [
            'Teknologi & Komputer' => 'Buku tentang pemrograman, hardware, dan teknologi terbaru.',
            'Fiksi & Sastra' => 'Novel, cerpen, dan karya sastra Indonesia maupun terjemahan.',
            'Sejarah & Budaya' => 'Buku mengenai sejarah nusantara dan kebudayaan daerah.',
            'Bisnis & Manajemen' => 'Panduan bisnis, marketing, dan pengembangan diri.',
            'Sains & Alam' => 'Ensiklopedia dan buku pengetahuan alam.',
        ];

        foreach ($categories as $name => $desc) {
            Category::create([
                'name' => $name,
                'description' => $desc
            ]);
        }
        $this->command->info('Categories seeded!');

        // 2. Books
        $catIds = Category::pluck('id')->toArray();
        $bookTitles = [
            'Laskar Pelangi', 'Bumi Manusia', 'Ayat-Ayat Cinta', 'Negeri 5 Menara', 
            'Filosofi Kopi', 'Dilan 1990', 'Cantik Itu Luka', 'Pulang', 
            'Pemrograman Web Modern', 'Belajar Laravel untuk Pemula', 'Algoritma dan Struktur Data',
            'Sejarah Nasional Indonesia', 'Max Havelaar', 'Dasar-Dasar Akuntansi', 'Manajemen Strategis'
        ];

        foreach ($bookTitles as $title) {
            $book = Book::create([
                'title' => $title,
                'author' => $faker->name,
                'year' => $faker->numberBetween(2000, 2024),
                'category_id' => $faker->randomElement($catIds),
            ]);

            // 3. Book Conditions (Each book gets a condition record)
            BookCondition::create([
                'book_id' => $book->id,
                'condition' => $faker->randomElement(['baik', 'baik', 'baik', 'rusak ringan']), // Mostly baik
                'description' => $faker->sentence,
            ]);
        }
        $this->command->info('Books & Conditions seeded!');

        // 4. Members (Indonesian Names)
        for ($i = 0; $i < 15; $i++) {
            Member::create([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'status' => 'active',
            ]);
        }
        $this->command->info('Members seeded!');

        // 5. Borrowings & Returns
        $members = Member::all();
        $books = Book::all();

        foreach ($members as $member) {
            // Each member borrows 1-2 books
            if (rand(0, 1)) {
                $book = $books->random();
                
                // Active Borrowing
                Borrowing::create([
                    'member_id' => $member->id,
                    'book_id' => $book->id,
                    'borrow_date' => now()->subDays(rand(1, 10)),
                    'due_date' => now()->addDays(rand(1, 7)),
                    'status' => 'borrowed',
                ]);
            } else {
                // Returned Borrowing
                $book = $books->random();
                $borrowDate = now()->subDays(rand(10, 30));
                
                $borrowing = Borrowing::create([
                    'member_id' => $member->id,
                    'book_id' => $book->id,
                    'borrow_date' => $borrowDate,
                    'due_date' => $borrowDate->copy()->addDays(7),
                    'status' => 'returned',
                ]);

                // Create Return Record
                BookReturn::create([
                    'borrowing_id' => $borrowing->id,
                    'return_date' => $borrowDate->copy()->addDays(rand(5, 10)),
                    'fine_amount' => rand(0, 1) ? rand(2000, 10000) : 0,
                    'notes' => 'Dikembalikan tepat waktu / terlambat.',
                ]);
            }
        }
        $this->command->info('Borrowings & Returns seeded!');
    }
}
