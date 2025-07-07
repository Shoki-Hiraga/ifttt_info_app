<x-app-layout>
    <x-slot name="header">
        <h2 class="dashboard-title">
            {{ __('ダッシュボード') }}
        </h2>
    </x-slot>

    <div class="dashboard-container">
        <div class="dashboard-wrapper">
            <div class="dashboard-card">
                <div class="dashboard-message">
                    {{ __("ログイン中") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
