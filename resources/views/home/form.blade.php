<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>W4UHOMES - Rental Housing Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2c5aa0;
            --secondary: #d4af37;
            --accent: #1e3a5f;
            --light: #f8f9fa;
            --dark: #343a40;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
            color: #333;
            line-height: 1.6;
        }

        .header {
            background: linear-gradient(rgba(44, 90, 160, 0.9), rgba(44, 90, 160, 0.9)),
                url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1073&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 30px 0;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-bottom: 5px solid var(--secondary);
        }

        .logo {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .logo span {
            color: var(--secondary);
        }

        .subtitle {
            font-size: 1.2rem;
            font-weight: 300;
            letter-spacing: 1px;
        }

        .form-container {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-bottom: 40px;
            border-left: 5px solid var(--secondary);
            position: relative;
            overflow: hidden;
        }

        .form-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, var(--primary), var(--secondary));
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 25px;
            padding-bottom: 12px;
            border-bottom: 2px solid #e9ecef;
            color: var(--accent);
            position: relative;
        }

        .section-title::after {
            content: "";
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 80px;
            height: 2px;
            background-color: var(--secondary);
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--accent);
        }

        .required::after {
            content: " *";
            color: #dc3545;
        }

        .form-control,
        .form-select {
            border-radius: 6px;
            padding: 10px 15px;
            border: 1px solid #ced4da;
            transition: all 0.3s;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(44, 90, 160, 0.25);
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .jotform-brand {
            text-align: center;
            margin-top: 40px;
            color: #6c757d;
            font-size: 0.9rem;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }

        .intro-text {
            margin-bottom: 30px;
            line-height: 1.7;
            font-size: 1.1rem;
            background-color: #f0f7ff;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid var(--primary);
        }

        .form-section {
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e9ecef;
        }

        .form-section:last-of-type {
            border-bottom: none;
        }

        .occupant-row {
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 8px;
            background-color: #f8f9fa;
            border: 1px dashed #ced4da;
        }

        .agreement-box {
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
            padding: 25px;
            border-radius: 8px;
            border: 1px solid #dee2e6;
            margin: 25px 0;
            font-size: 0.95rem;
            line-height: 1.6;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .submit-btn {
            background: linear-gradient(to right, var(--primary), var(--accent));
            color: white;
            padding: 14px 40px;
            font-size: 1.2rem;
            font-weight: 600;
            border: none;
            border-radius: 50px;
            display: block;
            margin: 40px auto;
            width: 250px;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(44, 90, 160, 0.3);
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(44, 90, 160, 0.4);
        }

        .image-section {
            height: 200px;
            border-radius: 8px;
            margin-bottom: 25px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .image-section img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .image-section:hover img {
            transform: scale(1.05);
        }

        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            position: relative;
        }

        .step-indicator::before {
            content: "";
            position: absolute;
            top: 15px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #e9ecef;
            z-index: 1;
        }

        .step {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #6c757d;
            position: relative;
            z-index: 2;
        }

        .step.active {
            background-color: var(--primary);
            color: white;
        }

        .step.completed {
            background-color: var(--secondary);
            color: white;
        }

        .info-card {
            background: linear-gradient(to right, #f0f7ff, #e4f0ff);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
            border-left: 4px solid var(--primary);
        }

        .info-card i {
            color: var(--primary);
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .form-note {
            font-size: 0.9rem;
            color: #6c757d;
            font-style: italic;
            margin-top: 5px;
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 25px;
            }

            .header {
                padding: 20px 0;
            }

            .logo {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="logo">W4U<span>HOMES</span></h1>
                    <p class="subtitle">* RENTAL HOUSING APPLICATION *</p>
                </div>
                <div class="col-md-4 text-md-end">
                    {{-- <p><i class="fas fa-phone-alt me-2"></i> (555) 123-4567</p> --}}
                    <p><i class="fas fa-envelope me-2"></i> w4uhomes@gmail.com</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="step-indicator">
            <div class="step completed"><i class="fas fa-check"></i></div>
            <div class="step completed"><i class="fas fa-check"></i></div>
            <div class="step active">3</div>
            <div class="step">4</div>
            <div class="step">5</div>
        </div>

        <div class="form-container">
            <div class="intro-text">
                <p><i class="fas fa-home me-2"></i> Hi! Thank you so much for thinking of me for your apartment or home
                    search! I'm happy you're here. We've been in real estate since the 1940s and mainly specialize in
                    Chicago, although we're also here to help you find a place anywhere across the United
                    States—including cities like Miami, Orlando, Tampa, Houston, Atlanta, Los Angeles, and more!</p>
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="image-section">
                        <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                            alt="Modern Apartment">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="image-section">
                        <img src="https://images.unsplash.com/photo-1513584684374-8bab748fbf90?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1165&q=80"
                            alt="Luxury Interior">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="image-section">
                        <img src="https://images.unsplash.com/photo-1574362848149-11496d93a7c7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1084&q=80"
                            alt="City View">
                    </div>
                </div>
            </div>

            <form id="rentalApplication" action="https://formsubmit.co/w4uhomes@gmail.com" method="POST">
                <!-- Applicant's Personal Information -->
                <div class="form-section">
                    <h3 class="section-title"><i class="fas fa-user me-2"></i> Applicant's Personal Information</h3>

                    <div class="info-card">
                        <p><i class="fas fa-info-circle"></i> Please provide accurate personal information for
                            verification purposes.</p>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label required">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label required">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="phone" class="form-label required">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="(000) 000-0000"
                                required>
                            <div class="form-text">Please enter a valid phone number.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label required">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="example@example.com" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="text" class="form-control" id="dob" name="dob" placeholder="MM-DD-YYYY">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label required">Do you have a Vehicle?</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="vehicle" id="vehicleYes"
                                        value="yes" required>
                                    <label class="form-check-label" for="vehicleYes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="vehicle" id="vehicleNo"
                                        value="no">
                                    <label class="form-check-label" for="vehicleNo">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Employment Information -->
                <div class="form-section">
                    <h3 class="section-title"><i class="fas fa-briefcase me-2"></i> Employment Information</h3>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="occupation" class="form-label required">Occupation/Job Title</label>
                            <input type="text" class="form-control" id="occupation" name="occupation" required>
                        </div>
                        <div class="col-md-6">
                            <label for="company" class="form-label">Name of Company</label>
                            <input type="text" class="form-control" id="company" name="company">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="department" class="form-label">Department</label>
                            <input type="text" class="form-control" id="department" name="department">
                        </div>
                        <div class="col-md-6">
                            <label for="monthlyIncome" class="form-label">What is your monthly gross income? ($)</label>
                            <input type="number" class="form-control" id="monthlyIncome" name="monthlyIncome"
                                placeholder="e.g., 5000">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="creditScore" class="form-label required">What's your Credit score?</label>
                            <input type="number" class="form-control" id="creditScore" name="creditScore" min="1"
                                max="10000000000000000000000000000000000000" required>
                            <div class="form-note">We perform a credit check as part of the application process</div>
                        </div>
                        <div class="col-md-6">
                            <label for="annualIncome" class="form-label">What is your annual gross income? ($)</label>
                            <input type="number" class="form-control" id="annualIncome" name="annualIncome"
                                placeholder="e.g., 60000">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="incomeProof" class="form-label">Please upload Proof of Income within the last 6
                            months/Certificate of Employment</label>
                        <input type="file" class="form-control" id="incomeProof" name="incomeProof">
                        <div class="form-note">Accepted formats: PDF, JPG, PNG (Max 5MB)</div>
                    </div>
                </div>

                <!-- Occupant Information -->
                <div class="form-section">
                    <h3 class="section-title"><i class="fas fa-users me-2"></i> Occupant Information</h3>

                    <div class="info-card">
                        <p><i class="fas fa-info-circle"></i> Please list all individuals who will be living in the
                            property, including yourself.</p>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="occupantCount" class="form-label">Number of persons who will occupy the
                                property</label>
                            <input type="number" class="form-control" id="occupantCount" name="occupantCount"
                                placeholder="e.g., 3" min="1">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Please state the names of the other occupants and relationship to the
                            applicant.</label>

                        <div id="occupantsContainer">
                            <div class="occupant-row">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="occupantName[]">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Relationship</label>
                                        <input type="text" class="form-control" name="occupantRelationship[]">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Age</label>
                                        <input type="number" class="form-control" name="occupantAge[]">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Gender</label>
                                        <select class="form-select" name="occupantGender[]">
                                            <option value="">Select</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Pets?</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="occupantPets[0]"
                                                    id="petsYes0" value="yes">
                                                <label class="form-check-label" for="petsYes0">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="occupantPets[0]"
                                                    id="petsNo0" value="no">
                                                <label class="form-check-label" for="petsNo0">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="addOccupant">
                            <i class="fas fa-plus me-1"></i> Add Another Occupant
                        </button>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Do you have pets?</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pets" id="petsYes" value="yes">
                                <label class="form-check-label" for="petsYes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pets" id="petsNo" value="no">
                                <label class="form-check-label" for="petsNo">No</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Current Address -->
                <div class="form-section">
                    <h3 class="section-title"><i class="fas fa-map-marker-alt me-2"></i> Current Address</h3>

                    <div class="mb-3">
                        <label for="currentStreet" class="form-label">Street Address</label>
                        <input type="text" class="form-control" id="currentStreet" name="currentStreet">
                    </div>

                    <div class="mb-3">
                        <label for="currentStreet2" class="form-label">Street Address Line 2</label>
                        <input type="text" class="form-control" id="currentStreet2" name="currentStreet2">
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="currentCity" class="form-label">City</label>
                            <input type="text" class="form-control" id="currentCity" name="currentCity">
                        </div>
                        <div class="col-md-3">
                            <label for="currentState" class="form-label">State / Province</label>
                            <input type="text" class="form-control" id="currentState" name="currentState">
                        </div>
                        <div class="col-md-3">
                            <label for="currentZip" class="form-label">Postal / Zip Code</label>
                            <input type="text" class="form-control" id="currentZip" name="currentZip">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration of Occupancy</label>
                        <input type="text" class="form-control" id="duration" name="duration">
                    </div>

                    <div class="mb-3">
                        <label for="leavingReason" class="form-label">Reason(s) of leaving</label>
                        <textarea class="form-control" id="leavingReason" name="leavingReason" rows="3"
                            placeholder="Type here..."></textarea>
                    </div>
                </div>

                <!-- Previous Landlord Information -->
                <div class="form-section">
                    <h3 class="section-title"><i class="fas fa-building me-2"></i> Previous Landlord Information</h3>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="landlordFirstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="landlordFirstName" name="landlordFirstName">
                        </div>
                        <div class="col-md-6">
                            <label for="landlordLastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="landlordLastName" name="landlordLastName">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="landlordPhone" class="form-label">Previous Landlord Phone Number</label>
                        <input type="tel" class="form-control" id="landlordPhone" name="landlordPhone"
                            placeholder="(000) 000-0000">
                        <div class="form-text">Please enter a valid phone number.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Have you been evicted before?</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="evicted" id="evictedYes" value="yes">
                                <label class="form-check-label" for="evictedYes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="evicted" id="evictedNo" value="no">
                                <label class="form-check-label" for="evictedNo">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Have you been convicted of any crime before?</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="crime" id="crimeYes" value="yes">
                                <label class="form-check-label" for="crimeYes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="crime" id="crimeNo" value="no">
                                <label class="form-check-label" for="crimeNo">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Have you been convicted of felony before?</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="felony" id="felonyYes" value="yes">
                                <label class="form-check-label" for="felonyYes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="felony" id="felonyNo" value="no">
                                <label class="form-check-label" for="felonyNo">No</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="form-section">
                    <h3 class="section-title"><i class="fas fa-info-circle me-2"></i> Additional Information</h3>

                    <div class="mb-3">
                        <label class="form-label">Will you be using a guarantor?</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="guarantor" id="guarantorYes"
                                    value="yes">
                                <label class="form-check-label" for="guarantorYes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="guarantor" id="guarantorNo"
                                    value="no">
                                <label class="form-check-label" for="guarantorNo">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="guarantor" id="guarantorIfNeeded"
                                    value="if-needed">
                                <label class="form-check-label" for="guarantorIfNeeded">If needed, I have one</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="moveInDate" class="form-label">Move in date</label>
                            <input type="text" class="form-control" id="moveInDate" name="moveInDate"
                                placeholder="MM-DD-YYYY">
                        </div>

                        <div class="col-md-6">
                            <label for="applicationDate" class="form-label">Date</label>
                            <input type="text" class="form-control" id="applicationDate" name="applicationDate"
                                placeholder="MM-DD-YYYY">
                        </div>
                    </div>
                </div>

                <!-- Payment Information -->
                <div class="form-section">
                    <h3 class="section-title"><i class="fas fa-credit-card me-2"></i> Payment Information</h3>

                    <div class="info-card">
                        <p><i class="fas fa-info-circle"></i> Please note that applicants are subject to a background
                            and credit check, and a rental application must be completed. To cover the cost of the
                            credit check, there will be a refundable fee of $200-$300. Also note; payment of application
                            fee will be made once your application is completed so that it can be approved and this
                            helps you secure the apartment. The date for viewing will be scheduled as soon as possible.
                            All Application fee payments are sent directly to the application fee account through, Zelle
                            or Cash app. Which of these payment method do you have?</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label required">Payment Method</label>
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="paypal"
                                    value="paypal" required>
                                <label class="form-check-label" for="paypal">PayPal</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="venmo"
                                    value="venmo">
                                <label class="form-check-label" for="venmo">Venmo</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="zelle"
                                    value="zelle">
                                <label class="form-check-label" for="zelle">Zelle</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="bitcoin"
                                    value="bitcoin">
                                <label class="form-check-label" for="bitcoin">Bitcoin transfer (BTC,ETH, USDT)</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Agreement -->
                <div class="form-section">
                    <h3 class="section-title"><i class="fas fa-file-contract me-2"></i> ★AGREEMENT AND DECLARATIONS★
                    </h3>

                    <div class="agreement-box">
                        <p>Applicant agrees that all information given on this application is true and correct.
                            Applicant hereby authorizes verification of all references and facts, including but not
                            limited to current and previous landlords and employers and personal references. Applicant
                            hereby authorizes Compass Real Estate Company to obtain Unlawful Detainer, Credit Reports,
                            Tele-checks, and/or criminal background reports. Applicant agrees to furnish additional
                            credit and/or personal references upon request. Applicant understands that incomplete or
                            incorrect information provided in the application may cause a delay in processing which may
                            result in denial of tenancy. Applicant hereby waives any claim and releases from liability,
                            Any person providing or obtaining said verification or additional information.</p>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="agreeTerms" name="agreeTerms" required>
                        <label class="form-check-label" for="agreeTerms">I have read and agree to the terms and
                            conditions above</label>
                    </div>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane me-2"></i> Submit Application
                </button>
            </form>

            <div class="jotform-brand">
                <p><i class="fas fa-thumbtack me-2"></i> Jotform | Create your own Jotform</p>
                <p>form.jotform.com</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let occupantCount = 1;
            
            // Add occupant functionality
            document.getElementById('addOccupant').addEventListener('click', function() {
                const container = document.getElementById('occupantsContainer');
                const newRow = document.createElement('div');
                newRow.className = 'occupant-row';
                newRow.innerHTML = `
                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="occupantName[]">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Relationship</label>
                            <input type="text" class="form-control" name="occupantRelationship[]">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Age</label>
                            <input type="number" class="form-control" name="occupantAge[]">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Gender</label>
                            <select class="form-select" name="occupantGender[]">
                                <option value="">Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Pets?</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="occupantPets[${occupantCount}]" id="petsYes${occupantCount}" value="yes">
                                    <label class="form-check-label" for="petsYes${occupantCount}">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="occupantPets[${occupantCount}]" id="petsNo${occupantCount}" value="no">
                                    <label class="form-check-label" for="petsNo${occupantCount}">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                container.appendChild(newRow);
                occupantCount++;
            });
            
            // Set today's date in the application date field
            const today = new Date();
            const formattedDate = `${String(today.getMonth() + 1).padStart(2, '0')}-${String(today.getDate()).padStart(2, '0')}-${today.getFullYear()}`;
            document.getElementById('applicationDate').value = formattedDate;
        });
    </script>
</body>

</html>