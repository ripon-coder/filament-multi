<?php

namespace App\Filament\User\Pages;

use App\Models\General;
use Filament\Pages\Page;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Textarea;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;

class Settings extends Page implements HasForms
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.user.pages.settings';

    protected static ?string $title = 'General Settings';

    protected static ?string $slug = 'general-settings';


    // Declare properties but don't initialize them to null
    public $logo = [];
    public $mobile_number_1;
    public $mobile_number_2;
    public $email;
    public $address;
    public $facebook;
    public $instragram;
    public $whatsapp;
    public $linkdin;
    public $youtube;
    public $telegram;
    public $about_us;

    protected function getFormSchema(): array
    {
        return [
            Section::make('Basic Information')
                ->columns(1)
                ->schema([
                    FileUpload::make('logo')
                        ->directory('logos')
                        ->image()
                        ->preserveFilenames()
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
                    Textarea::make('about_us'),
                ]),
        ];
    }
    public function mount()
    {
        $general = General::first();

        if ($general) {
            // Initialize the properties with the values from the General model
        //$this->logo = $general->logo ? Storage::url($general->logo) : null;

            $this->mobile_number_1 = $general->mobile_number_1;
            $this->mobile_number_2 = $general->mobile_number_2;
            $this->email = $general->email;
            $this->address = $general->address;
            $this->facebook = $general->facebook;
            $this->instragram = $general->instragram;
            $this->whatsapp = $general->whatsapp;
            $this->linkdin = $general->linkdin;
            $this->youtube = $general->youtube;
            $this->telegram = $general->telegram;
            $this->about_us = $general->about_us;
        }
    }
    public function submit()
    {
        $formData = $this->form->getState();


        $state = array_filter([
            'logo'=> $this->logo ? url('/storage/'.array_values($this->logo)[0]): null,
            'mobile_number_1' => $formData['mobile_number_1'],
            'mobile_number_2' => $formData['mobile_number_2'],
            'email' => $formData['email'],
            'address' => $formData['address'],
            'facebook' => $formData['facebook'],
            'instragram' => $formData['instragram'],
            'whatsapp' => $formData['whatsapp'],
            'linkdin' => $formData['linkdin'],
            'youtube' => $formData['youtube'],
            'telegram' => $formData['telegram'],
            'about_us' => $formData['about_us'],
        ]);

        $general = General::first();
        if ($general) {
            $general->update($state);
        } else {
            General::create($state);
        }

        Notification::make() 
        ->title('Saved successfully')
        ->success()
        ->send(); 
    }
}
