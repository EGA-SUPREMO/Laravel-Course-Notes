<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PaymentType extends Component
{
    public string $titleList;
    public string $extra;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $titleList, string $extra)
    {
        $this -> titleList = $titleList;
        $this -> extra = $extra;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.payment-type');
    }

    public function list(string $lastValue)
    {
        return [
            'great',
            'lcfirst(str)',
            $lastValue,
        ];
    }
}
