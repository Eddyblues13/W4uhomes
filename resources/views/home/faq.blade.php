@extends('layouts.app')

@section('title', 'Frequently Asked Questions')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">FAQ</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="section-title">Frequently Asked Questions</h1>
            <p class="section-subtitle">Find answers to common questions about buying, selling, and renting properties
            </p>
        </div>
    </div>

    <!-- Search FAQ -->
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search FAQs..." id="faqSearch">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Categories -->
    <div class="row mb-4">
        <div class="col-12">
            <ul class="nav nav-pills justify-content-center mb-4" id="faqTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="buying-tab" data-bs-toggle="tab" data-bs-target="#buying"
                        type="button" role="tab">
                        <i class="fas fa-home me-2"></i>Buying
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="selling-tab" data-bs-toggle="tab" data-bs-target="#selling"
                        type="button" role="tab">
                        <i class="fas fa-dollar-sign me-2"></i>Selling
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="renting-tab" data-bs-toggle="tab" data-bs-target="#renting"
                        type="button" role="tab">
                        <i class="fas fa-key me-2"></i>Renting
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="general-tab" data-bs-toggle="tab" data-bs-target="#general"
                        type="button" role="tab">
                        <i class="fas fa-info-circle me-2"></i>General
                    </button>
                </li>
            </ul>
        </div>
    </div>

    <!-- FAQ Content -->
    <div class="row">
        <div class="col-12">
            <div class="tab-content" id="faqTabContent">
                <!-- Buying FAQ -->
                <div class="tab-pane fade show active" id="buying" role="tabpanel">
                    <div class="accordion" id="buyingAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#buying1">
                                    How do I start the home buying process?
                                </button>
                            </h2>
                            <div id="buying1" class="accordion-collapse collapse show"
                                data-bs-parent="#buyingAccordion">
                                <div class="accordion-body">
                                    Start by getting pre-approved for a mortgage to understand your budget. Then work
                                    with one of our agents to find properties that match your criteria. Once you find a
                                    home you love, make an offer, conduct inspections, and proceed to closing.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#buying2">
                                    What is the typical down payment?
                                </button>
                            </h2>
                            <div id="buying2" class="accordion-collapse collapse" data-bs-parent="#buyingAccordion">
                                <div class="accordion-body">
                                    Down payments typically range from 3% to 20% of the home's purchase price.
                                    Conventional loans often require 5-20%, while FHA loans can be as low as 3.5%. The
                                    exact amount depends on your loan type, credit score, and the lender's requirements.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#buying3">
                                    How long does it take to buy a home?
                                </button>
                            </h2>
                            <div id="buying3" class="accordion-collapse collapse" data-bs-parent="#buyingAccordion">
                                <div class="accordion-body">
                                    The home buying process typically takes 30-45 days from offer acceptance to closing.
                                    However, this can vary based on market conditions, financing, and other factors. The
                                    search process before finding the right home can take anywhere from a few weeks to
                                    several months.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Selling FAQ -->
                <div class="tab-pane fade" id="selling" role="tabpanel">
                    <div class="accordion" id="sellingAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#selling1">
                                    How do I determine my home's value?
                                </button>
                            </h2>
                            <div id="selling1" class="accordion-collapse collapse show"
                                data-bs-parent="#sellingAccordion">
                                <div class="accordion-body">
                                    We provide free home valuations using comparable sales in your area, current market
                                    trends, and your home's specific features. For the most accurate pricing, we
                                    recommend a professional appraisal or consultation with one of our experienced
                                    agents.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#selling2">
                                    What costs are involved in selling a home?
                                </button>
                            </h2>
                            <div id="selling2" class="accordion-collapse collapse" data-bs-parent="#sellingAccordion">
                                <div class="accordion-body">
                                    Typical costs include real estate agent commissions (5-6%), closing costs (2-4%),
                                    home preparation and repairs, staging costs, and potential capital gains taxes. We
                                    provide a detailed breakdown of all expected costs during our initial consultation.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Renting FAQ -->
                <div class="tab-pane fade" id="renting" role="tabpanel">
                    <div class="accordion" id="rentingAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#renting1">
                                    What do I need to apply for a rental?
                                </button>
                            </h2>
                            <div id="renting1" class="accordion-collapse collapse show"
                                data-bs-parent="#rentingAccordion">
                                <div class="accordion-body">
                                    Typically, you'll need: government-issued ID, proof of income (recent pay stubs or
                                    employment verification), rental history, and references. Most landlords also
                                    require a credit check and background check. Application fees vary by property.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#renting2">
                                    How much is the security deposit?
                                </button>
                            </h2>
                            <div id="renting2" class="accordion-collapse collapse" data-bs-parent="#rentingAccordion">
                                <div class="accordion-body">
                                    Security deposits typically equal one month's rent, but this can vary by location
                                    and property. Some landlords may require first and last month's rent upfront. The
                                    deposit is refundable at the end of your lease, minus any deductions for damages
                                    beyond normal wear and tear.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- General FAQ -->
                <div class="tab-pane fade" id="general" role="tabpanel">
                    <div class="accordion" id="generalAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#general1">
                                    How accurate are the property valuations?
                                </button>
                            </h2>
                            <div id="general1" class="accordion-collapse collapse show"
                                data-bs-parent="#generalAccordion">
                                <div class="accordion-body">
                                    Our automated valuations are based on recent sales data, market trends, and property
                                    characteristics. They provide a good starting point but may not capture unique
                                    property features or recent upgrades. For the most accurate valuation, we recommend
                                    consulting with a local real estate agent.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#general2">
                                    Is my personal information secure?
                                </button>
                            </h2>
                            <div id="general2" class="accordion-collapse collapse" data-bs-parent="#generalAccordion">
                                <div class="accordion-body">
                                    Yes, we take data security seriously. We use industry-standard encryption and
                                    security measures to protect your personal information. We never share your data
                                    with third parties without your explicit consent, and you have full control over
                                    your privacy settings.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Still Have Questions -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card bg-primary text-white">
                <div class="card-body text-center py-5">
                    <h2 class="mb-3">Still Have Questions?</h2>
                    <p class="mb-4">Our team is here to help you with any questions you may have about buying, selling,
                        or renting properties.</p>
                    <a href="{{ route('contact') }}" class="btn btn-light btn-lg">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.getElementById('faqSearch').addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const accordionItems = document.querySelectorAll('.accordion-item');
    
    accordionItems.forEach(item => {
        const question = item.querySelector('.accordion-button').textContent.toLowerCase();
        const answer = item.querySelector('.accordion-body').textContent.toLowerCase();
        
        if (question.includes(searchTerm) || answer.includes(searchTerm)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});
</script>
@endsection
@endsection