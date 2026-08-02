<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Enums\BookingStatus;
use App\Filament\Resources\Articles\Pages\CreateArticle;
use App\Filament\Resources\Bookings\Pages\EditBooking;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\DataProvider;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        Role::findOrCreate('super_admin', 'web');

        $this->admin = User::factory()->create([
            'mfa_enabled' => false,
        ]);
        $this->admin->assignRole('super_admin');
    }

    public function test_guest_is_redirected_to_login(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
    }

    public function test_dashboard_loads_for_admin(): void
    {
        $this->actingAs($this->admin)
            ->get('/admin')
            ->assertSuccessful()
            ->assertSee('admin');
    }

    #[DataProvider('resourcePaths')]
    public function test_resource_index_pages_load(string $path): void
    {
        $this->actingAs($this->admin)
            ->get($path)
            ->assertSuccessful();
    }

    public static function resourcePaths(): array
    {
        return [
            'services' => ['/admin/services'],
            'case-studies' => ['/admin/case-studies'],
            'team-members' => ['/admin/team-members'],
            'articles' => ['/admin/articles'],
            'consultants' => ['/admin/consultants'],
            'schedule-slots' => ['/admin/schedule-slots'],
            'bookings' => ['/admin/bookings'],
        ];
    }

    public function test_articles_create_page_loads_without_error(): void
    {
        $this->actingAs($this->admin)
            ->get('/admin/articles/create')
            ->assertSuccessful()
            ->assertSee('Kategori');
    }

    public function test_create_option_action_sets_new_category(): void
    {
        $this->actingAs($this->admin);

        Livewire::test(CreateArticle::class)
            ->mountFormComponentAction('category', 'createOption')
            ->setFormComponentActionData(['name' => 'Perpajakan'])
            ->callMountedFormComponentAction()
            ->assertHasNoFormComponentActionErrors()
            ->assertFormSet(['category' => 'Perpajakan']);
    }

    public function test_confirm_booking_action_redirects_without_error(): void
    {
        $booking = Booking::factory()->create(['status' => BookingStatus::Pending]);

        $this->actingAs($this->admin);

        Livewire::test(EditBooking::class, ['record' => $booking->getKey()])
            ->callAction('confirm')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('bookings', [
            'id' => $booking->id,
            'status' => BookingStatus::Confirmed,
        ]);
    }
}
