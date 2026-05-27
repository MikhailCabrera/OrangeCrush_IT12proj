<?php

namespace Database\Seeders;

use App\Models\Booking;


use App\Models\Payment;
use App\Models\TermsAndCondition;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── Create Spatie roles ───────────────────────────────────────────────
        $roleCustomer   = Role::firstOrCreate(['name' => 'customer']);
        $roleAdmin      = Role::firstOrCreate(['name' => 'admin']);
        $roleSuperAdmin = Role::firstOrCreate(['name' => 'super_admin']);
        $roleStaff      = Role::firstOrCreate(['name' => 'staff']);

        // ── Seed users ────────────────────────────────────────────────────────
        $superAdmin = User::updateOrCreate(
            ['email' => 'superadmin@orangecrush.com'],
            [
                'first_name' => 'Super',
                'last_name'  => 'Admin',
                'password'   => Hash::make('password'),
                'phone'      => '09000000001',
            ]
        );
        $superAdmin->assignRole('super_admin');

        $admin = User::updateOrCreate(
            ['email' => 'admin@orangecrush.com'],
            [
                'first_name' => 'Admin',
                'last_name'  => 'User',
                'password'   => Hash::make('password'),
                'phone'      => '09000000002',
            ]
        );
        $admin->assignRole('admin');
        
        $staff = User::updateOrCreate(
            ['email' => 'staff@orangecrush.com'],
            [
                'first_name' => 'Staff',
                'last_name'  => 'Member',
                'password'   => Hash::make('password'),
                'phone'      => '09000000003',
            ]
        );
        $staff->assignRole('staff');

        $staff->assignRole('staff');

        $customer1 = User::updateOrCreate(
            ['email' => 'customer@orangecrush.com'],
            [
                'first_name' => 'Juan',
                'last_name'  => 'Dela Cruz',
                'password'   => Hash::make('password'),
                'phone'      => '09123456789',
            ]
        );
        $customer1->assignRole('customer');

        $customer2 = User::updateOrCreate(
            ['email' => 'maria@orangecrush.com'],
            [
                'first_name' => 'Maria',
                'last_name'  => 'Santos',
                'password'   => Hash::make('password'),
                'phone'      => '09987654321',
            ]
        );
        $customer2->assignRole('customer');



        // ── Vehicles ──────────────────────────────────────────────────────────
        $v1 = Vehicle::firstOrCreate(
            ['plate_number' => 'ABC-1234'],
            [
                'name'          => 'Toyota Vios',
                'brand'         => 'Toyota',
                'model'         => 'Vios',
                'year'          => 2022,
                'type'          => 'Sedan',
                'transmission'  => 'Automatic',
                'fuel'          => 'Gasoline',
                'capacity'      => 5,
                'price_per_day' => 1500.00,
                'status'        => 'available',
                'image'         => 'vehicles/toyota_vios.png',
                'description'   => 'Reliable and fuel-efficient sedan perfect for city driving.',
            ]
        );

        $v2 = Vehicle::firstOrCreate(
            ['plate_number' => 'XYZ-5678'],
            [
                'name'          => 'Honda HR-V',
                'brand'         => 'Honda',
                'model'         => 'HR-V',
                'year'          => 2023,
                'type'          => 'SUV',
                'transmission'  => 'Automatic',
                'fuel'          => 'Gasoline',
                'capacity'      => 5,
                'price_per_day' => 2200.00,
                'status'        => 'available',
                'image'         => 'vehicles/honda_hrv.png',
                'description'   => 'Compact SUV with great ground clearance and modern features.',
            ]
        );

        $v3 = Vehicle::firstOrCreate(
            ['plate_number' => 'MNO-9012'],
            [
                'name'          => 'Mitsubishi Montero Sport',
                'brand'         => 'Mitsubishi',
                'model'         => 'Montero Sport',
                'year'          => 2023,
                'type'          => 'SUV',
                'transmission'  => 'Automatic',
                'fuel'          => 'Diesel',
                'capacity'      => 7,
                'price_per_day' => 3500.00,
                'status'        => 'available',
                'image'         => 'vehicles/mitsubishi_montero.png',
                'description'   => '7-seater SUV with powerful diesel engine, great for family trips.',
            ]
        );

        $v4 = Vehicle::firstOrCreate(
            ['plate_number' => 'PQR-3456'],
            [
                'name'          => 'Ford Ranger',
                'brand'         => 'Ford',
                'model'         => 'Ranger',
                'year'          => 2022,
                'type'          => 'Pickup Truck',
                'transmission'  => 'Automatic',
                'fuel'          => 'Diesel',
                'capacity'      => 5,
                'price_per_day' => 3000.00,
                'status'        => 'available',
                'image'         => 'vehicles/ford_ranger.png',
                'description'   => 'Tough pickup truck with large cargo capacity, ideal for adventure.',
            ]
        );

        Vehicle::firstOrCreate(
            ['plate_number' => 'STU-7890'],
            [
                'name'          => 'Toyota Innova',
                'brand'         => 'Toyota',
                'model'         => 'Innova',
                'year'          => 2021,
                'type'          => 'Van',
                'transmission'  => 'Manual',
                'fuel'          => 'Diesel',
                'capacity'      => 8,
                'price_per_day' => 2800.00,
                'status'        => 'available',
                'image'         => 'vehicles/toyota_innova.png',
                'description'   => 'Spacious MPV perfect for group trips and family outings.',
            ]
        );

        // ── Terms & Conditions ────────────────────────────────────────────────
        if (TermsAndCondition::count() === 0) {
            TermsAndCondition::create([
                'content'    => "<h2>OrangeCrush Car Rentals — Terms &amp; Conditions</h2>
    <p>By booking a vehicle through OrangeCrush Car Rentals, you agree to the following terms:</p>
    <ol>
    <li><strong>Valid ID Required:</strong> A valid government-issued ID and driver's license must be presented upon vehicle pickup.</li>
    <li><strong>Payment:</strong> Full payment via GCash is required before the booking is confirmed.</li>
    <li><strong>Damage Liability:</strong> The renter is responsible for any damage to the vehicle during the rental period.</li>
    <li><strong>Fuel Policy:</strong> Vehicles must be returned with the same fuel level as provided.</li>
    <li><strong>Late Returns:</strong> Late returns beyond the agreed time will incur additional daily charges.</li>
    <li><strong>Cancellation:</strong> Cancellations made 24 hours before pickup are eligible for a partial refund.</li>
    <li><strong>Traffic Violations:</strong> The renter is solely responsible for any traffic violations incurred during the rental period.</li>
    </ol>",
                'updated_by' => $superAdmin->id,
            ]);
        }
    }
}
