<?php
namespace App\View\Components;

use Illuminate\View\Component;

class ErrorAlert extends Component
{
    public $title;
    public $message;

    /**
     * Create a new component instance.
     *
     * @param string $title
     * @param string $message
     * @return void
     */
    public function __construct($title = 'Danger Alert', $message = 'A simple danger alert—check it out!')
    {
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.error-alert');
    }
}
