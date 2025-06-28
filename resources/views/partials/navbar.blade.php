    <!-- Header -->
        <header>
        <div class="main-container">
            <div class="nav">
            <div class="logo">
                <a href="/">{{ substr ($biodata->full_name, 0, 2) }}</a>
            </div>

                <!-- Nav -->
                    <nav id="nav-menu" class="flex flex-col items-center space-y-4 md:flex md:flex-row md:items-center md:space-y-0 md:space-x-6 mt-4 md:mt-0">
                    <a href="{{ route('frontend.home') }}" class="text-gray-700 hover:text-blue-600">Home</a>
                    <a href="{{ url('/#portfolios') }}" class="text-gray-700 hover:text-blue-600">Portfolio</a>
                    <a href="{{ url('/#skills') }}" class="text-gray-700 hover:text-blue-600">Skills</a>
                    <a href="{{ route('frontend.contact') }}" class="text-gray-700 hover:text-blue-600">Contact</a>
                    <a href="{{ route('articles.index') }}" class="text-gray-700 hover:text-blue-600">Articles</a>
                    <a href="{{ route('gallery.index') }}" class="text-gray-700 hover:text-blue-600">Gallery</a>
                    <a href="{{ route('frontend.contact') }}">
                        <button class="border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white px-4 py-2 rounded transition">
                            Hire Me
                        </button>
                    </a>

                </nav>


            <div class="burger" id="burger">
                <div class="line-1"></div>
                <div class="line-2"></div>
                <div class="line-3"></div>
            </div>
            </div>

        </div>
        </header>
        <!-- End Header -->
