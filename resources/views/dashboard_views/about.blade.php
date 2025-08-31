@extends('layouts.dashboard-layout')

@section('main-content')


<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js'])
<body class="bg-gray-100 font-sans">
    <!-- Header -->
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-2xl font-bold text-gray-800">
                <a href="/">My Shop</a>
            </div>
            <div class="flex space-x-4">
                <a href="/Home" class="text-gray-600 hover:text-gray-800">Home</a>
                <a href="/products" class="text-gray-600 hover:text-gray-800">Products</a>
                <a href="/orders" class="text-gray-600 hover:text-gray-800">Orders</a>
                <a href="/settings" class="text-gray-600 hover:text-gray-800">Settings</a>
                <a href="/about" class="text-gray-600 hover:text-gray-800 font-bold">About</a>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="text-gray-600 hover:text-gray-800">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">About ShopSphere</h1>

        <div class="bg-white p-6 rounded-lg shadow max-w-3xl mx-auto">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Our Mission</h2>
            <p class="text-gray-600 mb-6">
                At ShopSphere, we aim to transform everyday life in Africa by connecting consumers with millions of goods and services through innovative, convenient, and affordable online solutions. Inspired by Jumia, we empower local sellers, create jobs, and drive economic growth across the continent.
            </p>

            <h2 class="text-xl font-bold text-gray-800 mb-4">Our History</h2>
            <p class="text-gray-600 mb-4">
                ShopSphere draws inspiration from Jumia, Africa’s leading e-commerce platform, founded in 2012 in Lagos, Nigeria, by Jeremy Hodara, Sacha Poignonnec, Tunde Kehinde, and Raphael Kofi Afaedor. Initially launched as Kasuwa (meaning "market" in Hausa), Jumia aimed to tap into Africa’s growing middle class and address the challenges of traditional retail, such as poor infrastructure and limited product availability.[](https://en.wikipedia.org/wiki/Jumia)[](https://logos-world.net/jumia-logo/)
            </p>
            <p class="text-gray-600 mb-4">
                Starting in Nigeria, Jumia quickly expanded to Egypt, Morocco, Ivory Coast, Kenya, and South Africa by 2013, and by 2014, it reached Tunisia, Tanzania, Ghana, Cameroon, Algeria, and Uganda. With backing from investors like Rocket Internet, MTN, and Millicom, Jumia grew its ecosystem, launching Jumia Travel for hotel bookings and Jumia Food for delivery services in 2013, followed by JumiaPay in 2016 to facilitate secure online transactions.[](https://en.wikipedia.org/wiki/Jumia)[](https://dcfmodeling.com/blogs/history/jmia-history-mission-ownership)
            </p>
            <p class="text-gray-600 mb-4">
                In 2016, Jumia became Africa’s first tech unicorn, valued at over $1 billion, and by 2019, it made history as the first African-focused tech company to list on the New York Stock Exchange (NYSE) with an IPO raising $196 million. Despite a soaring stock price initially, Jumia faced challenges, including allegations of fraud and a volatile market, leading to a stock decline by late 2019. The company also exited markets like Cameroon and Tanzania to focus on profitability.[](https://en.wikipedia.org/wiki/Jumia)[](https://techcrunch.com/2019/04/12/african-e-commerce-startup-jumias-shares-open-at-14-50-in-nyse-ipo/)[](https://qz.com/africa/1834923/jumia-africas-amazons-huge-losses-since-a-billion-dollar-ipo)
            </p>
            <p class="text-gray-600 mb-4">
                The COVID-19 pandemic in 2020 brought both opportunities and hurdles. Lockdowns boosted online shopping, with Jumia expanding grocery and sanitary offerings and introducing contactless delivery. Partnerships with Reckitt Benckiser, Egypt Post, and UNICEF strengthened its ecosystem, while a focus on rural and secondary markets enhanced accessibility. By 2021, over a third of businesses on Jumia in Côte d'Ivoire and over half in Kenya and Nigeria were women-owned, reflecting its social impact.[](https://en.wikipedia.org/wiki/Jumia)[](https://restofworld.org/2023/jumia-africa-customers-ipo/)
            </p>
            <p class="text-gray-600 mb-4">
                In 2022, Jumia faced leadership changes as co-founders Hodara and Poignonnec stepped down, with Francis Dufay appointed acting CEO. Despite financial losses, Jumia reported a 13% growth in fast-moving consumer goods sales in 2020 and ranked among Egypt’s top influential brands in 2021. Today, Jumia operates in 11 African countries, connecting over 70,000 sellers to 5.4 million consumers, with a robust logistics network and JumiaPay facilitating millions of transactions.[](https://en.wikipedia.org/wiki/Jumia)[](https://dcfmodeling.com/blogs/history/jmia-history-mission-ownership)[](https://restofworld.org/2023/jumia-africa-customers-ipo/)
            </p>
            <p class="text-gray-600 mb-6">
                ShopSphere builds on this legacy, striving to deliver a seamless online shopping experience, support local businesses, and empower communities across Africa with technology-driven solutions.
            </p>

            <!-- Feedback Form -->
            <h2 class="text-xl font-bold text-gray-800 mb-4">Share Your Feedback</h2>
            <form action="/about/feedback" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="feedback" class="block text-gray-700 font-semibold mb-2">Your Feedback</label>
                    <textarea id="feedback" name="feedback" placeholder="Tell us what you think about our mission and history" class="w-full border rounded px-3 py-2 @error('feedback') border-red-500 @enderror"></textarea>
                    @error('feedback')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        <input type="text" name="feedback_comment" placeholder="Add a comment for this error" class="w-full border rounded px-3 py-2 mt-2">
                    @enderror
                </div>
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 w-full">Submit Feedback</button>
            </form>
        </div>
    </main>
@endsection