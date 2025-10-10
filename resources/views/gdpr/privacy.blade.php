@extends('layouts.app')

@section('title', 'Privacy Policy - VIS GmbH')
@section('meta_description', 'Learn about how we collect, use, and protect your personal data.')

@section('content')
<div class="page-title-area bg-img" data-bg="{{ asset('assets/img/backgrounds/about.webp') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-content text-center">
                    <h2 class="title">Privacy Policy</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-wrapper section-space--inner--120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="privacy-policy-content">
                    <h1>Privacy Policy</h1>
                    <p><strong>Last updated:</strong> {{ date('F j, Y') }}</p>

                    <h2>1. Introduction</h2>
                    <p>Welcome to VIS GmbH. We respect your privacy and are committed to protecting your personal data. This privacy policy explains how we collect, use, and safeguard your information when you use our website and services.</p>

                    <h2>2. Information We Collect</h2>

                    <h3>Personal Information</h3>
                    <p>We may collect personal information that you voluntarily provide to us, including:</p>
                    <ul>
                        <li>Name and contact information (email, phone number)</li>
                        <li>Messages and inquiries submitted through our contact forms</li>
                        <li>Account information if you register for our services</li>
                    </ul>

                    <h3>Automatically Collected Information</h3>
                    <p>When you visit our website, we may automatically collect:</p>
                    <ul>
                        <li>IP address and device information</li>
                        <li>Browser type and version</li>
                        <li>Pages visited and time spent on our site</li>
                        <li>Referring website information</li>
                    </ul>

                    <h2>3. How We Use Your Information</h2>
                    <p>We use the collected information for:</p>
                    <ul>
                        <li>Responding to your inquiries and providing customer support</li>
                        <li>Improving our website and services</li>
                        <li>Sending you relevant information (with your consent)</li>
                        <li>Complying with legal obligations</li>
                        <li>Protecting our rights and preventing fraud</li>
                    </ul>

                    <h2>4. Cookies and Tracking Technologies</h2>
                    <p>We use cookies and similar technologies to:</p>
                    <ul>
                        <li>Remember your preferences</li>
                        <li>Analyze website traffic and usage patterns</li>
                        <li>Provide personalized content</li>
                    </ul>
                    <p>You can control cookie settings through your browser preferences. However, disabling cookies may affect the functionality of our website.</p>

                    <h2>5. Data Sharing and Disclosure</h2>
                    <p>We do not sell, trade, or rent your personal information to third parties. We may share your information only in the following circumstances:</p>
                    <ul>
                        <li>With your explicit consent</li>
                        <li>To comply with legal obligations</li>
                        <li>To protect our rights and safety</li>
                        <li>With trusted service providers who assist in our operations (under strict confidentiality agreements)</li>
                    </ul>

                    <h2>6. Data Security</h2>
                    <p>We implement appropriate technical and organizational measures to protect your personal data against unauthorized access, alteration, disclosure, or destruction. These measures include:</p>
                    <ul>
                        <li>Encryption of data in transit and at rest</li>
                        <li>Regular security assessments</li>
                        <li>Access controls and authentication</li>
                        <li>Secure data storage practices</li>
                    </ul>

                    <h2>7. Data Retention</h2>
                    <p>We retain personal information only as long as necessary for the purposes outlined in this policy or as required by law. Contact form submissions are typically retained for 3 years for customer service purposes.</p>

                    <h2>8. Your Rights (GDPR)</h2>
                    <p>If you are located in the European Union, you have the following rights regarding your personal data:</p>
                    <ul>
                        <li><strong>Right to Access:</strong> Request information about the personal data we hold about you</li>
                        <li><strong>Right to Rectification:</strong> Request correction of inaccurate data</li>
                        <li><strong>Right to Erasure:</strong> Request deletion of your personal data</li>
                        <li><strong>Right to Restrict Processing:</strong> Request limitation of data processing</li>
                        <li><strong>Right to Data Portability:</strong> Request a copy of your data in a structured format</li>
                        <li><strong>Right to Object:</strong> Object to processing of your personal data</li>
                    </ul>
                    <p>To exercise these rights, please contact us using the information provided below.</p>

                    <h2>9. Third-Party Links</h2>
                    <p>Our website may contain links to third-party websites. We are not responsible for the privacy practices of these external sites. We encourage you to review the privacy policies of any third-party websites you visit.</p>

                    <h2>10. Changes to This Policy</h2>
                    <p>We may update this privacy policy from time to time. We will notify you of any changes by posting the new policy on this page and updating the "Last updated" date.</p>

                    <h2>11. Contact Information</h2>
                    <p>If you have any questions about this privacy policy or our data practices, please contact us:</p>
                    <ul>
                        <li><strong>Email:</strong> privacy@salycms.com</li>
                        <li><strong>Phone:</strong> +1 (555) 123-4567</li>
                        <li><strong>Address:</strong> 123 Privacy Street, Data City, DC 12345</li>
                    </ul>

                    <div class="text-center mt-4">
                        <a href="{{ route('gdpr.index') }}" class="btn btn-primary">Manage Your Data Rights</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.privacy-policy-content {
    max-width: 800px;
    margin: 0 auto;
    line-height: 1.8;
}

.privacy-policy-content h1 {
    color: #2d3748;
    margin-bottom: 20px;
}

.privacy-policy-content h2 {
    color: #4a5568;
    margin-top: 30px;
    margin-bottom: 15px;
    border-bottom: 2px solid #e2e8f0;
    padding-bottom: 5px;
}

.privacy-policy-content h3 {
    color: #2d3748;
    margin-top: 25px;
    margin-bottom: 10px;
}

.privacy-policy-content ul {
    margin-bottom: 15px;
}

.privacy-policy-content li {
    margin-bottom: 5px;
}
</style>
@endsection
