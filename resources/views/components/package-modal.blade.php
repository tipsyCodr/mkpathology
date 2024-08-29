    <!-- Package Modal -->
    <div class="modal fade-in-up" id="package-modal" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" style="bottom:-30px; top:initial;">
        <div class="modal-dialog modal-dialog-scrollable d-flex align-items-end">
            <div class="modal-content mb-4" style="border-top-left-radius: 25px;border-top-right-radius: 25px;">
                <div class="modal-header">
                    @for ($i = 0; $i < 1; $i++)
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div id="loading-spinner" class="d-flex justify-content-center align-items-center"
                    style="height: 100%;">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

                <div class="modal-body" style="display: none;">
                    <div class="d-flex flex-row justify-content-between my-2">
                        <h5 class="modal-title fs-2 package_name text-accent" id="staticBackdropLabel">
                            {{ $package->name }}</h5>
                        <p class="text-dark font-weight-bold fs-5 package_price nowrap">
                            ₹{{ $package->price }}</p> </br>

                    </div>

                    <img class="w-100 py-2 package_photo_url" src="" alt="Jaanch Infertility Profile" />
                    <div class="package-detail-instructions">
                        <div class="ProductDetailInstructions_product__instructions__YlmoF">
                            <div class="ProductDetailInstructions_product__instructions__box__6ZaNF undefined">
                                <span
                                    class="ProductDetailInstructions_product__instructions__box__heading__DzWSr">Fasting</span><span
                                    class="ProductDetailInstructions_product__instructions__box__fastingDur__mDNMM">10-12
                                    Hrs Required</span>
                            </div>
                            <div class="ProductDetailInstructions_product__instructions__box__6ZaNF undefined">
                                <span class="ProductDetailInstructions_product__instructions__box__heading__DzWSr">Get
                                    reports in</span><span
                                    class="ProductDetailInstructions_product__instructions__box__fastingDur__mDNMM">12
                                    hrs</span>
                            </div>
                        </div>

                        <div class="ProductDetailInstructions_homeCollection__c8urV">
                            <img src="assets/img/icon/delivery-boy.png" alt="" class=""
                                style="height:5rem;"><span>Home Sample Collection Available </span>
                        </div>
                        <span class="fs-5 font-weight-bold text-dark">What is it for ?</span>
                        <p class="package_description text-dark">{{ $package->description }}</p>

                        <div class="">
                            <b class="fs-5 font-weight-bold text-dark">Tests Included:</b>
                            <ul class="list-unstyled "id='wrapperTest'>
                                @php
                                    $testNames = [];
                                    if (!empty($package->test_id)) {
                                        $testIds = json_decode($package->test_id, true);
                                        foreach ($testIds as $testId) {
                                            $test = App\Models\Test::find($testId);
                                            if ($test) {
                                                $parameters = []; // Initialize parameters array
                                                if (!empty($test->parameter_id)) {
                                                    $parameterIds = json_decode($test->parameter_id, true);
                                                    foreach ($parameterIds as $parameterId) {
                                                        $parameter = App\Models\Parameter::find($parameterId);
                                                        if ($parameter) {
                                                            $parameters[] = $parameter->name;
                                                        }
                                                    }
                                                }
                                                $testNames[] = [
                                                    'test' => $test->name,
                                                    'parameters' => $parameters,
                                                ];
                                            }
                                        }
                                    }
                                @endphp

                                <ul class="list-unstyled">
                                    @foreach ($testNames as $index => $testName)
                                        <li class='text-accent list-none py-2' id="package_test_name">
                                            <!-- Trigger for collapsing the parameters list -->
                                            <a class="d-block text-decoration-none text-accent hover:text-accent fs-5"
                                                data-bs-toggle="collapse" href="#collapseParameters{{ $index }}"
                                                role="button" aria-expanded="false"
                                                aria-controls="collapseParameters{{ $index }}"
                                                style="color: inherit;">
                                                {{ $testName['test'] }} <span
                                                    class="font-weight-bold">({{ count($testName['parameters']) }})</span>
                                            </a>


                                            <!-- Collapsible content -->
                                            <ul class="collapse " id="collapseParameters{{ $index }}">
                                                @foreach ($testName['parameters'] as $parameter)
                                                    <li>{{ $parameter }}</li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>

                            </ul>
                        </div>
                    </div>
                </div> <!-- end of modal body  -->
                @endfor
                <div class="modal-footer">
                    @if (isset($cart) && $cart->items->contains('package_id', $package->id))
                        <form action="{{ route('cart.remove') }}" method="post">
                            @csrf
                            <input type="hidden" id="test_id" name="product_id" value="{{ $package->id }}">
                            <input type="hidden" name="type" value="package">
                            <input type="hidden" name="quantity" value="1">
                            <input class="position-relative bottom-10 btn btn-block btn-danger w-100" type="submit"
                                value="Remove from Cart">
                        </form>
                    @else
                        <form action="{{ route('cart.add') }}" method="post">
                            @csrf
                            <input type="hidden" id="test_id" name="product_id" value="{{ $package->id }}">
                            <input type="hidden" name="type" value="package">
                            <input type="hidden" name="quantity" value="1">
                            <input class="position-relative bottom-10 btn btn-block btn-accent w-100" type="submit"
                                value="Add to Cart">
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- Package Modal Ends-->
