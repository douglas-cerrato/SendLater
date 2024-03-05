# SendLater

SendLater is a web application that allows users to schedule emails to be sent at a specified date and time. It provides a convenient way to manage and automate email communication, whether for personal or professional use.

## Features

- **User Account Creation:** Users can sign up for an account to access the scheduling features.
- **Scheduled Email System:** Users can schedule emails to be sent at a specified date and time.
- **User Password Reset System:** Password reset functionality is available for user account security.
- **Unlimited Email Sending:** There are no limits on the number of emails that can be scheduled and sent.

## Installation

To run SendLater on your local machine, follow these steps:

1. **Download:** Clone this repository or download the source code as a ZIP file.
2. **Database Setup:** Execute the sendlater_schema.sql file to set up the database structure.
3. **API Key Configuration:** Create a file named sendgridkey.php and include your SendGrid RestAPI key.
4. **File Placement:** Move all files except the schema into your web server's public_html folder.
5. **Cron Job Setup:** Use CronTab or Task Scheduler to schedule the sendgrid_emailer.php script to run periodically.

## Usage

Once the installation steps are completed, users can access SendLater through their web browser. They can sign up for an account, schedule emails, manage their scheduled emails, and reset their passwords if needed.

## Contributing

If you would like to contribute to SendLater, please fork this repository, make your changes, and submit a pull request. We welcome any improvements, bug fixes, or feature enhancements.

## Website

Visit our website at [https://sendlater.douglascerrato2.digital](https://sendlater.douglascerrato2.digital) to learn more about SendLater and its features.

---

This README provides an overview of SendLater, how to install and use it, and guidelines for contributing and getting support. It aims to make it easy for users and developers to understand and engage with the project.
