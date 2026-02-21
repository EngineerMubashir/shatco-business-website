@extends('frontend.layouts.app')

@section('title', 'Home | SHATCOKSA')

@section('meta_description', $settings['home_meta_description'] ?? 'SHATCOKSA – Power, Solar, MEP, Low Current & ICT Solutions')
@section('meta_keywords', $settings['home_meta_keywords'] ?? 'SHATCOKSA, Power Solutions, Solar, MEP, ICT, Low Current')

@section('content')


@include('frontend.sections.hero')

@include('frontend.sections.services')

@include('frontend.sections.projects')

@include('frontend.sections.about')

@include('frontend.sections.testimonials')

@include('frontend.sections.faqs')
@include('frontend.sections.contact')

@endsection
