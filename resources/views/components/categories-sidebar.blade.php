
    {{-- categories sidebar --}}
    {{-- hover:shadow-xl hover:scale-105 transition  --}}
    <div class="bg-white px-4 pb-6 rounded-xl overflow-hidden h-1/2 sticky top-0">
      <div class="divide-y divide-gray-200 space-y-5">

          {{-- Location filter --}}
          <div class="pt-4">
              <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Location</h3>
              <div class="mt-4 flex items-center">
                  <input type="text" class="w-full border-yellow-500 focus:border-primary focus:ring-0 px-3 py-1 text-gray-600 text-sm shadow-sm rounded" placeholder="Location">
              </div>
          </div>
          {{-- end of Location filter --}}

          {{-- Property Type category 1 --}}
              <div class="pt-4">
                  <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Property Type</h3>
                  <div class="flex items-center">
                      <input type="checkbox" id="cat-1" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                      <label for="cat-1" class="text-gray-600 ml-3 cursor-pointer">Apartment</label>
                  </div>

                  <div class="flex items-center">
                      <input type="checkbox" id="cat-2" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                      <label for="cat-2" class="text-gray-600 ml-3 cursor-pointer">Condominium</label>
                  </div>

                  <div class="flex items-center">
                      <input type="checkbox" id="cat-3" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                      <label for="cat-3" class="text-gray-600 ml-3 cursor-pointer">House</label>
                  </div>
              </div>
          {{-- end category 1 --}}

          {{-- price filter --}}
              <div class="pt-4">
                  <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Price</h3>
                  <div class="mt-4 flex items-center">
                      <input type="text" class="w-full border-yellow-500 focus:border-primary focus:ring-0 px-3 py-1 text-gray-600 text-sm shadow-sm rounded" placeholder="min">
                      <span class="mx-3 text-gray-500"> - </span>
                      <input type="text" class="w-full border-yellow-500 focus:border-primary focus:ring-0 px-3 py-1 text-gray-600 text-sm shadow-sm rounded" placeholder="max">
                  </div>
              </div>
          {{-- end of price filter --}}

          {{-- Bedrooms category 2 --}}
          <div class="pt-4">
              <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Bedrooms</h3>
              <div class="flex items-center justify-between">
                  <div class="flex items-center">
                      <input type="checkbox" id="cat-2-1" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                      <label for="cat-2-1" class="text-gray-600 ml-1 cursor-pointer">1</label>
                  </div>

                  <div class="flex items-center">
                      <input type="checkbox" id="cat-2-2" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                      <label for="cat-2-2" class="text-gray-600 ml-1 cursor-pointer">2</label>
                  </div>

                  <div class="flex items-center">
                      <input type="checkbox" id="cat-2-3" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                      <label for="cat-2-3" class="text-gray-600 ml-1 cursor-pointer">3</label>
                  </div>

                  <div class="flex items-center">
                      <input type="checkbox" id="cat-2-4" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                      <label for="cat-2-4" class="text-gray-600 ml-1 cursor-pointer">4</label>
                  </div>

                  <div class="flex items-center">
                      <input type="checkbox" id="cat-2-5" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                      <label for="cat-2-5" class="text-gray-600 ml-1 cursor-pointer">5+</label>
                  </div>
              </div>
          </div>
          {{-- end category 2 --}}

          {{-- Short Term Type category 3 --}}
          <div class="pt-4">
              <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Short Term</h3>
              <div class="flex items-center">
                  <input type="checkbox" id="cat-3-1" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                  <label for="cat-3-1" class="text-gray-600 ml-3 cursor-pointer">Include</label>
              </div>

              <div class="flex items-center">
                  <input type="checkbox" id="cat-3-2" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                  <label for="cat-3-2" class="text-gray-600 ml-3 cursor-pointer">Exclude</label>
              </div>

              <div class="flex items-center">
                  <input type="checkbox" id="cat-3-3" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                  <label for="cat-3-3" class="text-gray-600 ml-3 cursor-pointer">Only</label>
              </div>
          </div>
          {{-- end category 3 --}}

          {{-- Amenities category 4 --}}
          <div class="pt-4">
              <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Amenities</h3>
              <div class="">
                  <div class="flex items-center">
                      <input type="checkbox" id="cat-4-1" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                      <label for="cat-4-1" class="text-gray-600 ml-1 cursor-pointer">Balcony</label>
                  </div>

                  <div class="flex items-center">
                      <input type="checkbox" id="cat-4-2" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                      <label for="cat-4-2" class="text-gray-600 ml-1 cursor-pointer">Swimming Pool</label>
                  </div>

                  <div class="flex items-center">
                      <input type="checkbox" id="cat-4-3" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                      <label for="cat-4-3" class="text-gray-600 ml-1 cursor-pointer">Gym</label>
                  </div>

                  <div class="flex items-center">
                      <input type="checkbox" id="cat-4-4" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                      <label for="cat-4-4" class="text-gray-600 ml-1 cursor-pointer">24/7 Security</label>
                  </div>

                  <div class="flex items-center">
                      <input type="checkbox" id="cat-4-5" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                      <label for="cat-4-5" class="text-gray-600 ml-1 cursor-pointer">Parking</label>
                  </div>

                  <div class="flex items-center">
                      <input type="checkbox" id="cat-4-6" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                      <label for="cat-4-6" class="text-gray-600 ml-1 cursor-pointer">Pets Allowed</label>
                  </div>
              </div>
          </div>
          {{-- end category 4 --}}

          {{-- Floor Area filter --}}
          <div class="pt-4">
              <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Floor Area</h3>
              <div class="mt-4 flex items-center">
                  <input type="text" class="w-full border-yellow-500 focus:border-primary focus:ring-0 px-3 py-1 text-gray-600 text-sm shadow-sm rounded" placeholder="0sqm">
                  <span class="mx-3 text-gray-500"> - </span>
                  <input type="text" class="w-full border-yellow-500 focus:border-primary focus:ring-0 px-3 py-1 text-gray-600 text-sm shadow-sm rounded" placeholder="0sqm">
              </div>
          </div>
          {{-- end of Floor Area filter --}}

      </div>
    </div>
  {{-- end of categories sidebar --}}
