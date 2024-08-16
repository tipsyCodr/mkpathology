<!-- Main modal -->
<div id="booking-modal-{{ $test->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Book Test
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="booking-modal-{{ $test->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <h2><span class="font-bold">Test Name: </span>{{ $test->name }}</h2>
                <form action="{{ route('test.book.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="test_id" value="{{ $test->id }}">

                    <div class="mb-3">
                        <label for="slot" class="font-bold">Select A Time Slot</label><br>
                        <select class="form-select" id="slot" name="slot" required>
                            <option value="">Select A Slot</option>
                            <option value="morning">Morning (10:00 AM - 12:00 PM)</option>
                            <option value="afternoon">Afternoon (12:00 PM - 04:00 PM)</option>
                            <option value="evening">Evening (04:00 PM - 08:00 PM)</option>
                        </select>
                    </div>
                    <div class="">
                        <div class="mb-3">
                            <label for="date" class="form-label font-bold">Select Booking Date</label><br>
                            <input type="date" class="form-control" id="date" name="date" required
                                min="<?php echo date('Y-m-d'); ?>" onchange="this.setCustomValidity('')"
                                oninput="this.setCustomValidity(this.value < new Date().toISOString().split('T')[0] ? 'Date cannot be in the past!' : '')"
                                pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-30)|(?:(?:0[13578]|1[02])-31))"
                                title="Enter a date in the format DD-MM-YYYY"
                                onkeydown="if(event.key=='Enter'){this.blur()}">

                        </div>
                    </div>
                    <span id='date-error' class=" text-red-500"></span>
                    <br>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="booking-modal" type="submit"
                    class="text-white bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">Book
                </button>
                </form>
                <button data-modal-hide="booking-modal-{{ $test->id }}" type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-orange-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
        </div>
    </div>
</div>
</div>
