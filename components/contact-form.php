<?php
/**
 * Contact Form Component
 * 
 * Handles the display and processing of the contact form
 * 
 * @author cod-emminex
 * @date 2025-04-06
 */

// Process form submission if POST request
$formSuccess = false;
$formError = '';
$formData = [
    'name' => '',
    'email' => '',
    'subject' => '',
    'message' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $formData = [
        'name' => $_POST['name'] ?? '',
        'email' => $_POST['email'] ?? '',
        'subject' => $_POST['subject'] ?? '',
        'message' => $_POST['message'] ?? ''
    ];
    
    // Basic validation
    if (empty($formData['name']) || empty($formData['email']) || empty($formData['message'])) {
        $formError = 'Please fill in all required fields.';
    } elseif (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $formError = 'Please enter a valid email address.';
    } else {
        // Send email (implement your actual email sending logic)
        $to = $config['site']['email'];
        $subject = 'Contact Form: ' . $formData['subject'];
        $message = "Name: {$formData['name']}\r\n";
        $message .= "Email: {$formData['email']}\r\n\r\n";
        $message .= "Message:\r\n{$formData['message']}";
        $headers = "From: {$formData['name']} <{$formData['email']}>\r\n";
        $headers .= "Reply-To: {$formData['email']}\r\n";
        
        if (mail($to, $subject, $message, $headers)) {
            $formSuccess = true;
            $formData = ['name' => '', 'email' => '', 'subject' => '', 'message' => '']; // Clear form
        } else {
            $formError = 'Sorry, there was an error sending your message. Please try again later.';
        }
    }
}
?>

<div class="contact-form-container">
    <div class="contact-form-card">
        <h2>Send a Message</h2>
        <p>Fill out the form below and I'll get back to you as soon as possible.</p>
        
        <?php if ($formSuccess): ?>
            <div class="alert alert-success">
                Thank you for your message! I will get back to you as soon as possible.
            </div>
        <?php endif; ?>
        
        <?php if ($formError): ?>
            <div class="alert alert-error">
                <?php echo htmlspecialchars($formError); ?>
            </div>
        <?php endif; ?>
        
        <form class="contact-form" id="contactForm" method="post" action="">
            <div class="form-group">
                <label for="name">Full Name <span class="required">*</span></label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    class="form-control" 
                    value="<?php echo htmlspecialchars($formData['name']); ?>"
                    required
                >
            </div>
            
            <div class="form-group">
                <label for="email">Email Address <span class="required">*</span></label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="form-control" 
                    value="<?php echo htmlspecialchars($formData['email']); ?>"
                    required
                >
            </div>
            
            <div class="form-group">
                <label for="subject">Subject</label>
                <input 
                    type="text" 
                    id="subject" 
                    name="subject" 
                    class="form-control" 
                    value="<?php echo htmlspecialchars($formData['subject']); ?>"
                >
            </div>
            
            <div class="form-group">
                <label for="message">Message <span class="required">*</span></label>
                <textarea 
                    id="message" 
                    name="message" 
                    class="form-control" 
                    rows="6" 
                    required
                ><?php echo htmlspecialchars($formData['message']); ?></textarea>
            </div>
            
            <div class="form-submit">
                <button type="submit" class="btn btn-primary btn-large">Send Message</button>
            </div>
        </form>
    </div>
</div>
