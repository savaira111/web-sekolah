<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Support\Facades\View::composer('layouts.superadmin.navbar', function ($view) {
            $allNotifications = collect();
            
            // 1. PPDB Notifications
            $rawApplicants = \App\Models\Applicant::where('status', 'Menunggu Review')
                ->latest()
                ->take(5)
                ->get();

            foreach($rawApplicants as $item) {
                $allNotifications->push([
                    'title' => 'Pendaftaran PPDB Baru',
                    'description' => $item->full_name . ' mendaftar di jurusan ' . $item->major,
                    'link' => route('superadmin.ppdb.show', $item->id),
                    'created_at' => $item->created_at,
                    'time' => $item->created_at->diffForHumans(),
                    'type' => 'ppdb'
                ]);
            }

            // 2. Extracurricular Notifications
            $rawEskul = \App\Models\ExtracurricularRegistration::where('status', 'pending')
                ->latest()
                ->take(5)
                ->get();

            foreach($rawEskul as $item) {
                $allNotifications->push([
                    'title' => 'Pendaftaran Eskul Baru',
                    'description' => $item->name . ' mendaftar eskul ' . $item->extracurricular,
                    'link' => route('superadmin.extracurricular-registrations.index'),
                    'created_at' => $item->created_at,
                    'time' => $item->created_at->diffForHumans(),
                    'type' => 'eskul'
                ]);
            }

            // 3. Message Notifications
            $rawMessages = \App\Models\ContactMessage::where('is_read', false)
                ->latest()
                ->take(5)
                ->get();

            foreach($rawMessages as $item) {
                $allNotifications->push([
                    'title' => 'Pesan Baru',
                    'description' => 'Pesan dari ' . $item->name . ': ' . \Illuminate\Support\Str::limit($item->subject, 30),
                    'link' => route('superadmin.messages.show', $item->id),
                    'created_at' => $item->created_at,
                    'time' => $item->created_at->diffForHumans(),
                    'type' => 'message'
                ]);
            }

            $adminNotifications = $allNotifications->sortByDesc('created_at')->take(10);
            
            $unreadCount = \App\Models\Applicant::where('status', 'Menunggu Review')->count() + 
                          \App\Models\ExtracurricularRegistration::where('status', 'pending')->count() +
                          \App\Models\ContactMessage::where('is_read', false)->count();

            $view->with('adminNotifications', $adminNotifications)
                 ->with('unreadNotificationsCount', $unreadCount);
        });
    }
}
