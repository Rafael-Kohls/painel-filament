<?php

use App\GroupEnum;
use Filament\Forms\Components\Select;

if (!function_exists('filament_form_select_groups')) {
    function filament_form_select_groups(string $name = 'groups'): Select
    {

        $options = [
            GroupEnum::ADMIN->value => GroupEnum::ADMIN->label(),
            GroupEnum::GUEST->value => GroupEnum::GUEST->label(),

        ];

        return Select::make($name)
            ->label(__('Grupos'))
            ->options($options);
    }
}
