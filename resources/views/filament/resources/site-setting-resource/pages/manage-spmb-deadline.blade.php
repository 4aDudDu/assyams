@extends('filament::page')

@section('content')
    <div class="space-y-6">
        {{ $this->form }}

        <div class="flex justify-end gap-2">
            {{ $this->getSaveFormAction() }}
        </div>
    </div>
@endsection
