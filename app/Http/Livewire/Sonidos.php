<?php

namespace App\Http\Livewire;

use Livewire\Component;
use duncan3dc\Speaker\TextToSpeech;
use duncan3dc\Speaker\Providers\GoogleProvider;
use duncan3dc\Speaker\Providers\ResponsiveVoiceProvider;
use App\Events\NotificarMensaje;

use File;

class Sonidos extends Component
{
    public $texto,$filename, $showNewOrderNotification=false;
    protected $listeners = ['echo:notificaciones,NotificarMensaje' => 'notifyNewConvertion'];

    public function notifyNewConvertion($event)
    {
        // $this->showNewOrderNotification = true;
        // dd($notification);
        $this->emit("reproducir",$event['notification']);

        // session()->flash('flash.banner', 'Yay for free components!');
        // session()->flash('flash.bannerStyle', 'success');

        // return $this->redirect('/');
    }

    public function render()
    {
        return view('livewire.sonidos');
    }
    public function convertir(){
        // $provider = new GoogleProvider("es");
        // $provider = new ResponsiveVoiceProvider('es');
        // try {
        //     $tts = new TextToSpeech($this->texto, $provider);
        // } catch (\Throwable $th) {
        //     dd($th);
        // }

        // // storage_path('app')

        // $path = storage_path('app').'/public';
        // $data = $tts->getAudioData();
        // File::put($path , $data);
        // $this->filename = $tts->generateFilename();
        // dd($this->filename);
        // $this->emit("reproducir",$this->texto);
        event(new NotificarMensaje($this->texto));
    }
}
