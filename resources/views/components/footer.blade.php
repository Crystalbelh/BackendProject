<footer class="bg-blue-900 text-white mt-auto">
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4 flex items-center">
                    <i class="fas fa-shopping-cart text-orange-400 mr-2"></i> {{ config('app.name') }}
                </h3>
                <p class="mb-4">Your one-stop shop for all your needs.</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-white hover:text-orange-300 text-xl"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-white hover:text-orange-300 text-xl"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white hover:text-orange-300 text-xl"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white hover:text-orange-300 text-xl"><i class="fab fa-pinterest"></i></a>
                </div>
            </div>
            <div>
                <h4 class="font-bold text-lg mb-4">Shop</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-orange-300 transition duration-300">All Products</a></li>
                    <li><a href="#" class="hover:text-orange-300 transition duration-300">Featured</a></li>
                    <li><a href="#" class="hover:text-orange-300 transition duration-300">New Arrivals</a></li>
                    <li><a href="#" class="hover:text-orange-300 transition duration-300">Sale Items</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-lg mb-4">Customer Service</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-orange-300 transition duration-300">Contact Us</a></li>
                    <li><a href="#" class="hover:text-orange-300 transition duration-300">FAQs</a></li>
                    <li><a href="#" class="hover:text-orange-300 transition duration-300">Shipping Policy</a></li>
                    <li><a href="#" class="hover:text-orange-300 transition duration-300">Returns & Exchanges</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-lg mb-4">Contact Info</h4>
                <ul class="space-y-2">
                    <li class="flex items-center">
                        <i class="fas fa-map-marker-alt text-orange-400 mr-2"></i> 123 Street, City, Country
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone-alt text-orange-400 mr-2"></i> +1 234 567 890
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-envelope text-orange-400 mr-2"></i> info@example.com
                    </li>
                </ul>
            </div>
        </div>
        <div class="border-t border-blue-800 mt-8 pt-8 text-center text-sm">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved. Last updated: August 14, 2025, 03:53 PM WAT</p>
        </div>
    </div>
</footer>