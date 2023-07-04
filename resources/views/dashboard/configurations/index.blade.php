@extends('layouts.master')
@section('title', 'Configurações')

@section('content')
    <livewire:dashboard.configurations.list-configuration :item="$item"/>
    @push('scripts')
        <script>
            Livewire.emit('refreshComponent');
        </script>
    @endpush
@endsection
