<section class="py-12 md:px-20 px-4 lg:text-left text-center  lg:block  shadow footer-bg border-t border-secondary-200 ">
    <div class="md:flex w-full gap-10">
        <div class="md:w-[450px]  text-center">
            <img class="mb-5 md:w-52 w-40 m-auto" src="{{ asset('images/footer-logo.png') }}">
            <div class="font-normal text-base">2023 Installs Direct. All rights reserved. <br> Installs Direct is a trading name of Newpower Advanced Ltd, Company No 14496911</div>
        </div>
        <div class="w-full">
            <div class="md:flex justify-between border-b border-gray-200 gap-5 mb-10 pb-4">
                <div>
                    <div class="font-medium text-xl">Join our newsletter</div>
                    <div class="font-normal text-lg">We will send you an email now and then with important updates. No Spam.</div>
                </div>
                <div class="flex items-center gap-4">
                    <input type="email" name="email"
                        class="mt-1 h-10 w-52 px-3 py-2 text-base bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block rounded-md  focus:ring-1"
                        placeholder="Enter your email" />
                    <button class="bg-blue-900 text-white rounded-lg px-4 md:mt-0 mt-2 p-2">Subscribe</button>
                </div>
            </div>
            <div class="lg:flex justify-between">
                <div>
                    <h5 class="md:text-xl text-base font-medium md:mb-2 mb-2 mt-6 md:mt-0 gray-text">Company</h5>
                    <ul class="leading-9">
                        <li><a class="gray-text  text-lg" href="{{ route('aboutus') }}">About Us</a></li>
                        <li><a class="gray-text  text-lg" href="{{ route('contactus') }}">Contact Us</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="md:text-xl text-base font-medium md:mb-2 mb-2 mt-6 md:mt-0 gray-text">Social Media</h5>
                    <ul class="leading-9">
                        <li><a class="gray-text text-lg" href="https://twitter.com/i/flow/login">Twitter</a></li>
                        <li><a class="gray-text text-lg" href="https://www.facebook.com/people/Installs-Direct/61554612986809/">Facebook</a></li>
                        <li><a class="gray-text text-lg" href="https://www.instagram.com/accounts/login/">Instagram</a></li>
                        <li><a class="gray-text text-lg" href="https://www.linkedin.com/login">Linkedin</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="md:text-xl text-base font-medium md:mb-2 mb-2 mt-6 md:mt-0 gray-text">Legal</h5>
                    <ul class="leading-9">
                        <li><a class="gray-text text-lg" href="{{ route('privacypolicy') }}">Privacy</a></li>
                        <li><a class="gray-text text-lg" href="{{ route('contactus') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
