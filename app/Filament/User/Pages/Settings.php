<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class Settings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.user.pages.settings';

    protected static ?string $title = 'General Settings';

    protected static ?string $slug = 'general-settings';

    protected function getFormSchema(): array
    {
        return [
            Section::make('Basic Information')
                ->columns(1)
                ->schema([
                    FileUpload::make('image')
                        ->label('Logo')
                        ->directory('logo')
                        ->image()
                        ->maxSize(1024),
                    TextInput::make('mobile_number_1')
                        ->required(),
                    TextInput::make('mobile_number_2'),
                    TextInput::make('email')
                        ->label('Email address')
                        ->required()
                        ->rules(['email']),

                    Textarea::make('address')
                        ->required()
                ]),

            Section::make('Social Link')
                ->columns(2)
                ->schema([
                    TextInput::make('facebook')
                        ->url(),
                    TextInput::make('instragram')
                        ->url(),
                    TextInput::make('whatsapp')
                        ->url(),
                    TextInput::make('linkdin')
                        ->url(),
                    TextInput::make('youtube')
                        ->url(),
                    TextInput::make('telegram')
                        ->url(),
                ]),

            Section::make('Footer Section')
                ->columns(1)
                ->schema([
                    Textarea::make('About Us'),
                ]),
        ];
    }
}
