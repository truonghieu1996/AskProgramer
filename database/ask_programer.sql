-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2017 at 11:00 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ask_programer`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_category`, `created_at`, `updated_at`) VALUES
(1, 'Java', '2017-12-12 07:02:47', '2017-12-12 07:02:47'),
(2, 'C#', '2017-12-12 07:18:43', '2017-12-12 07:18:43'),
(3, 'NodeJS', '2017-12-12 07:18:51', '2017-12-12 07:18:51'),
(4, 'AngulaJS', '2017-12-12 07:18:59', '2017-12-12 07:18:59'),
(5, 'PHP', '2017-12-12 07:19:05', '2017-12-12 07:19:05'),
(6, 'C++', '2017-12-12 07:19:12', '2017-12-12 07:19:12'),
(7, 'C', '2017-12-12 07:19:16', '2017-12-12 07:19:16'),
(8, 'ASP.NET', '2017-12-12 07:19:25', '2017-12-12 07:19:25'),
(9, 'ASP.NET Core', '2017-12-12 07:19:33', '2017-12-12 07:19:33'),
(10, 'Javascript', '2017-12-12 07:19:44', '2017-12-12 07:19:44'),
(11, 'Asymply', '2017-12-12 07:20:10', '2017-12-12 07:20:10'),
(12, 'Android', '2017-12-15 21:16:19', '2017-12-15 21:16:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `score` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_approved` int(11) DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `amount_view` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `category_id`, `title`, `content`, `score`, `created_at`, `updated_at`, `is_approved`, `user_id`, `amount_view`) VALUES
(1, 1, 'Aks question about java language.', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>I&#39;ve defined a custom annotation for Spring&#39;s @PreAuthorize with allows passing in custom permission parameters.</p>\r\n\r\n			<pre>\r\n<code>@Retention(RetentionPolicy.RUNTIME)\r\n@PreAuthorize(&quot;@evaluator.permission(#permission))\r\npublic @interface CustomPermission {\r\n    CapabilityPermission permission() default Permission.READ;\r\n}</code></pre>\r\n\r\n			<p>This way in SpringBoot&#39;s controller I could use it as</p>\r\n\r\n			<pre>\r\n<code>@ApiOperation(&quot;Sample&quot;)\r\n@RequestMapping(value = &quot;/test&quot;, method = GET)\r\n@CustomPermission(permission = Permission.READ)\r\npublic String getData() {\r\n  return &quot;&quot;;\r\n}</code></pre>\r\n\r\n			<p>Unfortunately when evaluating SpEL runs into trouble by throwing SpelEvaluationException for #this and #root or is giving me a null for #permission. I have tried all sorts of variants of</p>\r\n\r\n			<pre>\r\n<code>@PreAuthorize(&quot;@evaluator.permission(#permission))\r\n@PreAuthorize(&quot;@evaluator.permission(#permission())\r\n@PreAuthorize(&quot;@evaluator.permission(#this.permission))\r\n@PreAuthorize(&quot;@evaluator.permission(#root.permission))</code></pre>\r\n\r\n			<p>and I know that @evaluator is calling .permission appropriately because I can debug into it. So - is there a special syntax I am missing on how to call a local property of @interface?</p>\r\n\r\n			<p>Hoping someone tried this before, thanks!</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 0, '2017-12-15 21:10:28', '2017-12-15 21:10:28', 1, 1, 0),
(3, 1, 'Getting Exception in thread “AWT-EventQueue-0” java.lang.NullPointerException Error', '<p>So in my program I have a JOptionPane with an inputdialog which works fine but whenever I click &quot;Cancel&quot;, it gives me this error:</p>\r\n\r\n<pre>\r\nException in thread &quot;AWT-EventQueue-0&quot; java.lang.NullPointerException\r\nat AccountingJournal.actionPerformed(AccountingJournal.java:341)\r\nat javax.swing.AbstractButton.fireActionPerformed(Unknown Source)\r\nat javax.swing.AbstractButton$Handler.actionPerformed(Unknown Source)\r\nat javax.swing.DefaultButtonModel.fireActionPerformed(Unknown Source)\r\nat javax.swing.DefaultButtonModel.setPressed(Unknown Source)\r\nat javax.swing.plaf.basic.BasicButtonListener.mouseReleased(Unknown Source)\r\nat java.awt.Component.processMouseEvent(Unknown Source)\r\nat javax.swing.JComponent.processMouseEvent(Unknown Source)\r\nat java.awt.Component.processEvent(Unknown Source)\r\nat java.awt.Container.processEvent(Unknown Source)\r\nat java.awt.Component.dispatchEventImpl(Unknown Source)\r\nat java.awt.Container.dispatchEventImpl(Unknown Source)\r\nat java.awt.Component.dispatchEvent(Unknown Source)\r\nat java.awt.LightweightDispatcher.retargetMouseEvent(Unknown Source)\r\nat java.awt.LightweightDispatcher.processMouseEvent(Unknown Source)\r\nat java.awt.LightweightDispatcher.dispatchEvent(Unknown Source)\r\nat java.awt.Container.dispatchEventImpl(Unknown Source)\r\nat java.awt.Window.dispatchEventImpl(Unknown Source)\r\nat java.awt.Component.dispatchEvent(Unknown Source)\r\nat java.awt.EventQueue.dispatchEventImpl(Unknown Source)\r\nat java.awt.EventQueue.access$500(Unknown Source)\r\nat java.awt.EventQueue$3.run(Unknown Source)\r\nat java.awt.EventQueue$3.run(Unknown Source)\r\nat java.security.AccessController.doPrivileged(Native Method)\r\nat java.security.ProtectionDomain$JavaSecurityAccessImpl.doIntersectionPrivilege(Unknown Source)\r\nat java.security.ProtectionDomain$JavaSecurityAccessImpl.doIntersectionPrivilege(Unknown Source)\r\nat java.awt.EventQueue$4.run(Unknown Source)\r\nat java.awt.EventQueue$4.run(Unknown Source)\r\nat java.security.AccessController.doPrivileged(Native Method)\r\nat java.security.ProtectionDomain$JavaSecurityAccessImpl.doIntersectionPrivilege(Unknown Source)\r\nat java.awt.EventQueue.dispatchEvent(Unknown Source)\r\nat java.awt.EventDispatchThread.pumpOneEventForFilters(Unknown Source)\r\nat java.awt.EventDispatchThread.pumpEventsForFilter(Unknown Source)\r\nat java.awt.EventDispatchThread.pumpEventsForHierarchy(Unknown Source)\r\nat java.awt.EventDispatchThread.pumpEvents(Unknown Source)\r\nat java.awt.EventDispatchThread.pumpEvents(Unknown Source)\r\nat java.awt.EventDispatchThread.run(Unknown Source)</pre>\r\n\r\n<p>Here&#39;s where the error is:</p>\r\n\r\n<pre>\r\npublic class AccountingJournal implements ActionListener {\r\n    JFrame frame, frame2, frame3, frame4;\r\n    JLabel main_title, test, title, date, accountNumber, description, \r\ncreditOrDebit, amount, dollarSign, date2;\r\n    JButton main_addTransaction, main_addAccount, main_reportAccount, \r\nmain_reportCreditDebit, main_reportFull, main_Exit, addTransaction_confirm, \r\naddTransaction_cancel;\r\n    String [] accountNumbers = new String[100];\r\n    JComboBox dateDay, dateMonth, dateYear, accountNumberField, creditDebit;\r\n    JTextField descriptionField, amountMoney;\r\n    File f;\r\n    FileReader r;\r\n    BufferedReader b = null;\r\n    FileWriter fw;\r\n    BufferedWriter bw = null;\r\n    String whichReport = &quot;&quot;;\r\n    String accountNum = &quot;&quot;;\r\n    String whichAccount = &quot;&quot;;\r\n\r\n\r\n    if (evt.getSource()==main_reportCreditDebit){\r\n        String [] creditDebit = {&quot;Credit&quot;, &quot;Debit&quot;};\r\n        String reportCreditDebit = (JOptionPane.showInputDialog(null, &quot;Select Credit or Debit&quot;, &quot;Report by Credit/Debit&quot;,\r\n                                    JOptionPane.PLAIN_MESSAGE, null, creditDebit, null)).toString();  \r\n\r\n\r\n        if (reportCreditDebit != null) {\r\n            if (reportCreditDebit == &quot;Credit&quot;) {\r\n                    whichReport = &quot;credit&quot;;\r\n            }\r\n            else if (reportCreditDebit == &quot;Debit&quot;) {\r\n                    whichReport = &quot;debit&quot;;\r\n            }\r\n            fullReport(whichReport);\r\n        }\r\n\r\n    }\r\n\r\n    if (evt.getSource()==main_reportFull){\r\n            whichReport = &quot;full&quot;;\r\n            fullReport(whichReport);\r\n    }\r\n\r\n    if (evt.getSource()==main_Exit){\r\n        frame.dispose();\r\n    }\r\n\r\n    if (evt.getSource()==addTransaction_confirm) {\r\n         try {\r\n                f = new File(&quot;Report.txt&quot;);\r\n                f.createNewFile();\r\n            r = new FileReader(f);\r\n            b = new BufferedReader(r);   \r\n            fw = new FileWriter(f, true);\r\n            bw = new BufferedWriter(fw);\r\n            }\r\n         catch(Exception e){\r\n             System.out.println(&quot;File does not exist!&quot;);\r\n            }\r\n\r\n         String reportLine = (dateDay.getSelectedItem() + &quot; &quot; + dateMonth.getSelectedItem() + &quot; &quot; + dateYear.getSelectedItem() + &quot; &quot; + accountNumberField.getSelectedItem() + &quot; &quot; + creditDebit.getSelectedItem() + &quot; &quot; + amountMoney.getText() + &quot; &quot; + descriptionField.getText() + &quot;\\n&quot;);\r\n\r\n         try {\r\n             String money = amountMoney.getText();\r\n             double moneyInt = Double.parseDouble(money);\r\n\r\n             try {\r\n                 bw.write(reportLine); \r\n                 b.close();\r\n                 bw.close();\r\n             }\r\n             catch (Exception e){\r\n                System.out.println(&quot;No save file found!&quot;);\r\n             }\r\n            frame2.dispose();\r\n            }\r\n         catch (Exception e){\r\n            JOptionPane.showMessageDialog(null, &quot;You Must Enter an amount of Money!&quot;, &quot;Error&quot;, JOptionPane.ERROR_MESSAGE);\r\n                frame2.dispose();\r\n         }\r\n    }\r\n\r\n    if (evt.getSource()==addTransaction_cancel){\r\n        frame2.dispose();\r\n    }\r\n}\r\n\r\n}</pre>\r\n\r\n<p>There are two of these and both of them give me he same error. I&#39;ve tried adding an if statement to check if it equals null but it didn&#39;t work, still got the exact same error. So how do I fix the error?</p>\r\n\r\n<p>BTW, I only get the error when I hit the &quot;Cancel&quot; button on the joptionpane, I never get the error otherwise</p>\r\n\r\n<p>Thanks!</p>', 0, '2017-12-15 21:24:59', '2017-12-16 08:04:49', 1, 2, 3),
(4, 1, 'Turbine Dashboard Is not Loading for Aggregation in Spring Cloud Microservice', '<p>I am trying to develop a spring cloud microservice using spring MVC and spring boot framework. And Eureka server , Zuul , Ribbon , hystrix and Turbine using for spring cloud. I already developed a microservice and implemented only hystrix dashboard. I am able to take hystrix dashboard. Now I am implementing more services. So I choosed turbine for aggregation of monitoring. But it not getting the dashboard.I implemented turbine in separate spring boot project.</p>\r\n\r\n<p>My pom.xml containing,</p>\r\n\r\n<pre>\r\n&lt;dependency&gt;\r\n    &lt;groupId&gt;org.springframework.boot&lt;/groupId&gt;\r\n    &lt;artifactId&gt;spring-boot-starter-actuator&lt;/artifactId&gt;\r\n&lt;/dependency&gt;\r\n&lt;dependency&gt;\r\n    &lt;groupId&gt;org.springframework.cloud&lt;/groupId&gt;\r\n    &lt;artifactId&gt;spring-cloud-starter-hystrix&lt;/artifactId&gt;\r\n&lt;/dependency&gt;\r\n&lt;dependency&gt;\r\n    &lt;groupId&gt;org.springframework.cloud&lt;/groupId&gt;\r\n    &lt;artifactId&gt;spring-cloud-starter-hystrix-dashboard&lt;/artifactId&gt;\r\n&lt;/dependency&gt;\r\n&lt;dependency&gt;\r\n    &lt;groupId&gt;org.springframework.cloud&lt;/groupId&gt;\r\n    &lt;artifactId&gt;spring-cloud-starter-turbine&lt;/artifactId&gt;\r\n&lt;/dependency&gt;</pre>\r\n\r\n<p>&nbsp;</p>', 0, '2017-12-16 06:03:19', '2017-12-16 06:22:40', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tong Thien Viet Anh', 'vietanh1508@gmail.com', '$2y$10$Whb/JlvTGHRUkvedb9RnSuh1mq0W6Xdws9JXqfvZhknFkq0fVm9DS', 1, 'BxuucQhDTqS2bdUh0NzvE0QM0yQw7igq1AqEs4vdljtSNShejJxrsvOeMgzt', '2017-12-06 01:15:07', '2017-12-06 01:15:07'),
(2, 'Nguyen Van An', 'nvan@gmail.com', '$2y$10$6huAdNRSb74v7E7wBjiaVu2GUUjDzOcC51CX.Z4AJIhzXd0Ku.p7u', 0, 'g6bMv1LpE1lakqja6uKVx2QR9fouTjnaOKziwr5fJA31OQsnEjGS7jRrbaKa', '2017-12-12 07:14:34', '2017-12-12 07:14:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
