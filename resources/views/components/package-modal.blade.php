<style>
    .overlay.hide {
        display: none;
    }

    .overlay.show {
        display: flex;
    }

    .overlay::before {
        content: ' ';
        background: rgba(0, 0, 0, 0.5);
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        z-index: 1029;
    }

    .overlay>.box {
        content: ' ';
        position: fixed;
        width: 400px;
        top: 0;
        right: 0;
        background-color: white;
        z-index: 1031;
        height: 100%;
        z-index: 1029;
    }

    .overlay>.box>.box-body {
        height: 90vh;
        margin-bottom: 50px;
        overflow-y: scroll;
        scrollbar-width: thin;
    }

    @media (max-width: 600px) {
        .overlay>.box {
            top: 20px;
            width: 100%;
        }
    }
</style>

<div id="sideBar" class=" justify-content-end overlay w-100 h-100 show">

    <div class="box shadow-sm">
        <div class="box-head d-flex flex-row justify-content-between" style="border-bottom:1px solid #dcd9d9 ">
            <p class="p-3 fs-5 text-dark">Test Details</p>
            <button onclick="hideSidebar()" type="button" class="btn-close p-3" data-bs-dismiss="modal"
                aria-label="Close"></button>
        </div>

        <div class="box-body p-3 overflow-y-scroll">
            <div class="d-flex justify-content-between align-items-center">
                <p id='sidebar_name' class="font-weight-bold text-accent fs-4">Package Name </p>
                <p id='sidebar_price' class=" text-dark font-weight-bold fs-5">299</p>
            </div>
            <div>
                <p class="text-dark font-weight-normal fs-6">Includes 2 Parameters</p>
            </div>
            <div>
                <form action="{{ route('cart.add') }}" method="post">
                    @csrf
                    <input type="hidden" id="test_id" name="product_id" value="">
                    <input type="hidden" name="type" value="package">
                    <input type="hidden" name="quantity" value="1">
                    <input class="position-relative bottom-0 btn btn-block btn-accent w-100 rounded-pill" type="submit"
                        value="Add to Cart">
                </form>
            </div>
            <div class=" py-4">
                <div class="ProductDetailInstructions_homeCollection__c8urV">
                    <img src="assets/img/icon/delivery-boy.png" alt="" class=""
                        style="height:3rem;"><span>Home Sample Collection Available </span>
                </div>
            </div>

            <div class="d-flex justify-content-evenly">
                <div class="d-flex flex-column border p-3">
                    <small class="">Fasting</small>
                    <span class="text-dark">10-12 Hrs Required</span>
                </div>
                <div class="d-flex flex-column border p-3">
                    <small class="">Get reports in</small>
                    <span class="text-dark">12 hrs</span>
                </div>
            </div>

            <div class=" py-3">
                <h4>What is it for?</h4>
            </div>

            <div id="accordionContainer">

            </div>


            {{-- QnA --}}
            <h4 class="py-3">Q&A </h4>
            <div class="accordion" id="qna-accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="qna-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#qna-collapseOne" aria-expanded="false" aria-controls="qna-collapseOne">
                            Q. How can I book my test?
                        </button>
                    </h2>
                    <div id="qna-collapseOne" class="accordion-collapse collapse" aria-labelledby="qna-headingOne"
                        data-bs-parent="#qna-accordion">
                        <div class="accordion-body">
                            A. If you are planning to book diagnostic tests with MKPathology Labs, then it is quite a
                            simple and smooth process. All you have to do is just call us and our well trained and
                            patient-friendly representatives will book an appointment for you. Also, you can book the
                            test online by visiting our website and as soon as we get your query within no time we will
                            make sure to book the appointment for you.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="qna-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#qna-collapseTwo" aria-expanded="false" aria-controls="qna-collapseTwo">
                            Q. In how much time will I get my test report?
                        </button>
                    </h2>
                    <div id="qna-collapseTwo" class="accordion-collapse collapse" aria-labelledby="qna-headingTwo"
                        data-bs-parent="#qna-accordion">
                        <div class="accordion-body">
                            A. MKPathology Labs knows how important the timing is when it comes to health checkups. We
                            make sure that reports are sent to you as soon as possible so that you can begin with the
                            right treatment and medications on time. You will get your reports within 24 hours.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="qna-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#qna-collapseThree" aria-expanded="false" aria-controls="qna-collapseThree">
                            Q. Where can I see or get my test results?
                        </button>
                    </h2>
                    <div id="qna-collapseThree" class="accordion-collapse collapse" aria-labelledby="qna-headingThree"
                        data-bs-parent="#qna-accordion">
                        <div class="accordion-body">
                            A. You can receive your test results at your given email address or on your phone number
                            and also on WhatsApp. MKPathology Labs makes sure to send precise and timely reports
                            following the highest standards to maintain quality.
                        </div>
                    </div>
                </div>
            </div>

            {{-- QnA ENd --}}

            <div class="foot py-3 text-center">
                <small>MKPathology Labs </small>

            </div>
        </div>
    </div>
</div>
<script>
    function hideSidebar() {
        $('#sideBar').removeClass('show');
        $('#sideBar').addClass('hide');
    }

    function showSidebar() {
        $('#sideBar').removeClass('hide');
        $('#sideBar').addClass('show');
    }
    // Function to generate list items
    function generateListItems(items) {
        let listItems = '';
        items.forEach(item => {
            listItems += `<li class="list-group-item">${item}</li>`;
        });
        return listItems;
    }

    // Function to generate a nested accordion
    function generateNestedAccordion(testName, listItems) {
        const testNameSlug = testName.replace(/\s+/g, '-').toLowerCase();
        const testNameId = testNameSlug.replace(/[^a-z0-9-]/g, '');
        return `
        <a class="text-accent" data-bs-toggle="collapse" href="#collapse-${testNameSlug}" role="button"
            aria-expanded="false" aria-controls="collapse-${testNameSlug}">${testName}</a>
        <div class="collapse " id="collapse-${testNameSlug}">
            <ul class="list-group">
                ${listItems}
            </ul>
        </div>`;
    }

    // Function to generate the main accordion
    function generateAccordion(testsData) {
        let accordionContent = `
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Included Tests
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body d-flex flex-column">`;

        testsData.forEach(test => {
            const listItems = generateListItems(test.items);
            accordionContent += generateNestedAccordion(test.name, listItems);
        });

        accordionContent += `</div></div></div></div>`;
        return accordionContent;
    }

    // Sample data
    const testsData = [{
            name: 'CBC',
            items: ['HbA1c', 'Fasting Blood Glucose', 'Post Prandial Blood Glucose']
        },
        {
            name: 'Lipid Profile',
            items: ['Total Cholesterol', 'HDL Cholesterol', 'LDL Cholesterol', 'Triglycerides']
        },
    ];
    // Add more test data as needed

    // Generate the accordion and append to the DOM
    document.addEventListener('DOMContentLoaded', function() {
        const accordionHTML = generateAccordion(testsData);
        $('#accordionContainer').html(accordionHTML);
    })



    function populateSidebar(id, type) {
        if (type == 'package') {
            $.ajax({
                url: "fetchPackage/" + id,
                type: "GET",
                data: {
                    id: id,
                    type: type
                },
                success: function(data) {
                    const accordionHTML = generateAccordion(data.tests);
                    $('#accordionContainer').html(accordionHTML);
                    // $('#sideBar').html(data);
                    showSidebar();

                }
            });
        } else {
            $.ajax({
                url: "fetchTest/" + id,
                type: "GET",
                data: {
                    id: id,
                    type: type
                },
                success: function(data) {
                    const accordionHTML = generateAccordion(testsData);
                    console.log(accordionHTML);
                    $('#accordionContainer').html(accordionHTML);
                    // $('#sideBar').html(data);
                    showSidebar();
                }
            });
        }


    }
</script>
