<?php
/**
 * Mantix default content.
 *
 * @package Mantix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns default values for theme mods and section datasets.
 *
 * @return array<string,mixed>
 */
function mantix_get_defaults() {
	return array(
		'mantix_meta_description'             => 'Mantix is a modern SaaS platform for teams that need faster workflows, stronger visibility, and scalable process control.',
		'mantix_announcement_enabled'         => true,
		'mantix_announcement_text'            => 'Now booking live demos for Mantix',
		'mantix_announcement_link_label'      => 'Reserve your slot',
		'mantix_announcement_link_url'        => '#contact',
		'mantix_header_primary_cta_label'     => 'Book Demo',
		'mantix_header_primary_cta_url'       => '#contact',
		'mantix_header_secondary_cta_label'   => 'Get Started',
		'mantix_header_secondary_cta_url'     => '#pricing',
		'mantix_color_primary'                => '#1b2a73',
		'mantix_color_accent'                 => '#0db4d6',
		'mantix_color_accent_alt'             => '#5b5de6',
		'mantix_color_surface'                => '#f4f7ff',
		'mantix_hero_eyebrow'                 => 'Built for modern operations teams',
		'mantix_hero_heading'                 => 'Manage work smarter with Mantix',
		'mantix_hero_text'                    => 'A modern platform to streamline operations, improve visibility, and help teams move faster with confidence.',
		'mantix_hero_primary_label'           => 'Book a Demo',
		'mantix_hero_primary_url'             => '#contact',
		'mantix_hero_secondary_label'         => 'Explore Features',
		'mantix_hero_secondary_url'           => '#features',
		'mantix_hero_badges'                  => "No-code workflow setup\nSecure cloud architecture\nOnboarding support included",
		'mantix_hero_badges_aria_label'       => 'Trust highlights',
		'mantix_hero_mockup_aria_label'       => 'Mantix dashboard preview',
		'mantix_hero_mockup_one_label'        => 'Workflow Completion',
		'mantix_hero_mockup_one_value'        => '86%',
		'mantix_hero_mockup_two_label'        => 'Pending Approvals',
		'mantix_hero_mockup_two_value'        => '14',
		'mantix_hero_mockup_three_label'      => 'Team Capacity',
		'mantix_hero_mockup_three_value'      => 'Balanced',
		'mantix_trusted_title'                => 'Teams choose Mantix to simplify operations and scale with clarity.',
		'mantix_trusted_logos'                => "Northpeak Group\nAsterion Labs\nBlueforge Systems\nHorizonOps\nSilverline Ventures",
		'mantix_features_eyebrow'             => 'Platform Features',
		'mantix_features_title'               => 'Everything your team needs to execute with confidence',
		'mantix_features_text'                => 'Mantix combines workflow control, collaboration, reporting, and security into one modern operating platform.',
		'mantix_showcase_eyebrow'             => 'Platform Overview',
		'mantix_showcase_title'               => 'A complete operating layer for modern businesses',
		'mantix_benefits_eyebrow'             => 'Why Mantix',
		'mantix_benefits_title'               => 'Business outcomes your leadership team can measure',
		'mantix_use_cases_eyebrow'            => 'Use Cases',
		'mantix_use_cases_title'              => 'Built for teams of every size and complexity',
		'mantix_stats_eyebrow'                => 'Impact',
		'mantix_stats_title'                  => 'Measured improvements after adopting Mantix',
		'mantix_testimonials_eyebrow'         => 'Customer Stories',
		'mantix_testimonials_title'           => 'Trusted by teams that value speed and operational clarity',
		'mantix_testimonials_rating_label'    => 'Rated 5 stars',
		'mantix_pricing_eyebrow'              => 'Pricing',
		'mantix_pricing_title'                => 'Choose a plan that matches your growth stage',
		'mantix_pricing_popular_label'        => 'Most Popular',
		'mantix_faq_eyebrow'                  => 'FAQ',
		'mantix_faq_title'                    => 'Answers to common questions about Mantix',
		'mantix_features_json'                => wp_json_encode(
			array(
				array(
					'icon'        => 'automation',
					'title'       => 'Workflow Automation',
					'description' => 'Automate recurring tasks, approvals, and handoffs so teams spend less time on manual coordination.',
				),
				array(
					'icon'        => 'collaboration',
					'title'       => 'Team Collaboration',
					'description' => 'Give teams one shared workspace for cross-functional updates, ownership, and transparent execution.',
				),
				array(
					'icon'        => 'reporting',
					'title'       => 'Smart Reporting',
					'description' => 'Track performance with customizable reports designed for leadership reviews and operational planning.',
				),
				array(
					'icon'        => 'insights',
					'title'       => 'Real-Time Insights',
					'description' => 'Monitor pipeline health and team progress in real time with live dashboards and smart alerts.',
				),
				array(
					'icon'        => 'security',
					'title'       => 'Secure Access Control',
					'description' => 'Set role-based permissions and protect sensitive data with enterprise-grade access policies.',
				),
				array(
					'icon'        => 'tracking',
					'title'       => 'Task & Process Tracking',
					'description' => 'Stay on top of every workflow stage with clear ownership, deadlines, and accountability trails.',
				),
				array(
					'icon'        => 'scalable',
					'title'       => 'Scalable Architecture',
					'description' => 'Scale from a single team to enterprise operations without rebuilding your systems.',
				),
				array(
					'icon'        => 'dashboard',
					'title'       => 'Customizable Dashboard',
					'description' => 'Configure views by department so everyone sees what matters for their role and goals.',
				),
			)
		),
		'mantix_showcase_json'                => wp_json_encode(
			array(
				array(
					'tag'         => 'Centralized Operations',
					'title'       => 'Unify your daily operations in one command center',
					'description' => 'Bring requests, approvals, projects, and process tracking into a single operational workflow.',
					'bullets'     => array(
						'Single source of truth across teams',
						'Configurable ownership and approval logic',
						'Fewer bottlenecks and fewer status meetings',
					),
				),
				array(
					'tag'         => 'Visibility Across Teams',
					'title'       => 'See progress clearly from strategy to execution',
					'description' => 'Give leadership and department heads real-time visibility into priorities, workloads, and blockers.',
					'bullets'     => array(
						'Cross-team dashboards and workload views',
						'Live updates without manual follow-up',
						'Alerts for risks and delayed dependencies',
					),
				),
				array(
					'tag'         => 'Faster Decision-Making',
					'title'       => 'Move from assumptions to data-backed decisions',
					'description' => 'Use operational metrics and trend reports to prioritize work, fix delays, and allocate resources with confidence.',
					'bullets'     => array(
						'Built-in performance and SLA tracking',
						'Custom report exports for stakeholders',
						'Operational insights at every management level',
					),
				),
				array(
					'tag'         => 'Configurable Workflows',
					'title'       => 'Adapt Mantix to your process, not the other way around',
					'description' => 'Design workflow paths for each department with configurable stages, forms, and permissions.',
					'bullets'     => array(
						'No-code process configuration',
						'Department-specific workflow templates',
						'Flexible setup for growth and change',
					),
				),
			)
		),
		'mantix_benefits_json'                => wp_json_encode(
			array(
				array(
					'title'       => 'Reduce manual work',
					'description' => 'Automated routing, reminders, and approvals remove repetitive overhead from core operations.',
				),
				array(
					'title'       => 'Improve team efficiency',
					'description' => 'Clear ownership and real-time status updates keep everyone aligned and execution focused.',
				),
				array(
					'title'       => 'Gain better visibility',
					'description' => 'Leadership can see progress, blockers, and output quality across every function in one place.',
				),
				array(
					'title'       => 'Scale confidently',
					'description' => 'Standardize processes today and expand capacity tomorrow without losing control.',
				),
			)
		),
		'mantix_use_cases_json'               => wp_json_encode(
			array(
				array(
					'title'       => 'Startups',
					'description' => 'Build lightweight processes early and grow without operational chaos.',
				),
				array(
					'title'       => 'SMEs',
					'description' => 'Run lean teams efficiently with automated handoffs and clear accountability.',
				),
				array(
					'title'       => 'Enterprise Teams',
					'description' => 'Coordinate complex operations with role-based controls and audit-ready tracking.',
				),
				array(
					'title'       => 'Operations Teams',
					'description' => 'Standardize routine workflows and monitor service delivery performance in real time.',
				),
				array(
					'title'       => 'Sales Teams',
					'description' => 'Track pipeline progress, approvals, and post-sale handoffs with full visibility.',
				),
				array(
					'title'       => 'Admin / HR / Management',
					'description' => 'Simplify internal requests, policies, onboarding, and cross-team coordination.',
				),
			)
		),
		'mantix_stats_json'                   => wp_json_encode(
			array(
				array(
					'label'  => 'Faster workflows',
					'value'  => 42,
					'suffix' => '%',
				),
				array(
					'label'  => 'Higher team visibility',
					'value'  => 68,
					'suffix' => '%',
				),
				array(
					'label'  => 'Reduced manual effort',
					'value'  => 37,
					'suffix' => '%',
				),
				array(
					'label'  => 'Better process consistency',
					'value'  => 55,
					'suffix' => '%',
				),
			)
		),
		'mantix_testimonials_json'            => wp_json_encode(
			array(
				array(
					'quote'   => 'Mantix gave our operations team the clarity and speed we were missing. We replaced disconnected trackers with one reliable system.',
					'name'    => 'Ariana Cole',
					'role'    => 'Head of Operations',
					'company' => 'Northpeak Group',
					'rating'  => 5,
				),
				array(
					'quote'   => 'Implementation was smooth, and the workflow builder made it easy to align the platform with how our teams already operate.',
					'name'    => 'Daniel Reyes',
					'role'    => 'COO',
					'company' => 'HorizonOps',
					'rating'  => 5,
				),
				array(
					'quote'   => 'The reporting layer alone changed how we run leadership reviews. We can now make decisions with current, trusted operational data.',
					'name'    => 'Mei Tan',
					'role'    => 'Director of Business Systems',
					'company' => 'Blueforge Systems',
					'rating'  => 5,
				),
			)
		),
		'mantix_pricing_json'                 => wp_json_encode(
			array(
				array(
					'name'        => 'Starter',
					'price'       => '$39',
					'period'      => '/month',
					'description' => 'For small teams getting started with process standardization.',
					'features'    => array(
						'Up to 10 users',
						'Core workflow automation',
						'Standard dashboards',
						'Email support',
					),
					'button'      => 'Start Starter Plan',
					'url'         => '#contact',
					'popular'     => false,
				),
				array(
					'name'        => 'Growth',
					'price'       => '$99',
					'period'      => '/month',
					'description' => 'For scaling teams that need stronger control and visibility.',
					'features'    => array(
						'Up to 50 users',
						'Advanced workflows and approvals',
						'Custom reporting',
						'Priority support',
					),
					'button'      => 'Choose Growth',
					'url'         => '#contact',
					'popular'     => true,
				),
				array(
					'name'        => 'Enterprise',
					'price'       => 'Custom',
					'period'      => '',
					'description' => 'For large organizations with complex governance and scale.',
					'features'    => array(
						'Unlimited users',
						'Enterprise-grade security',
						'Dedicated success manager',
						'Implementation support',
					),
					'button'      => 'Talk to Sales',
					'url'         => '#contact',
					'popular'     => false,
				),
			)
		),
		'mantix_faq_json'                     => wp_json_encode(
			array(
				array(
					'question' => 'How long does Mantix implementation take?',
					'answer'   => 'Most teams launch in 2 to 4 weeks, depending on workflow complexity and onboarding scope.',
				),
				array(
					'question' => 'Can we customize workflows for different departments?',
					'answer'   => 'Yes. Mantix supports department-specific workflow logic, forms, approvals, and permissions.',
				),
				array(
					'question' => 'Does Mantix support integrations?',
					'answer'   => 'Mantix supports API-based integrations and can connect with common business tools as part of onboarding.',
				),
				array(
					'question' => 'What kind of support is included?',
					'answer'   => 'All plans include support. Growth and Enterprise plans include faster response SLAs and strategic guidance.',
				),
				array(
					'question' => 'Is our data secure?',
					'answer'   => 'Mantix uses role-based access controls, encrypted data transfer, and security best practices for business-grade protection.',
				),
				array(
					'question' => 'Can Mantix scale as our company grows?',
					'answer'   => 'Yes. Mantix is built to scale from early-stage teams to large enterprise operations.',
				),
				array(
					'question' => 'Do you offer onboarding assistance?',
					'answer'   => 'Yes. We provide structured onboarding with workflow mapping, setup guidance, and training support.',
				),
				array(
					'question' => 'Can we request a tailored demo?',
					'answer'   => 'Absolutely. Share your goals in the form below and we will prepare a demo aligned to your use case.',
				),
			)
		),
		'mantix_final_cta_heading'            => 'Ready to streamline operations with Mantix?',
		'mantix_final_cta_text'               => 'Book a tailored walkthrough and discover how Mantix can improve speed, clarity, and control across your teams.',
		'mantix_final_cta_primary_label'      => 'Book Demo',
		'mantix_final_cta_primary_url'        => '#contact',
		'mantix_final_cta_secondary_label'    => 'Contact Sales',
		'mantix_final_cta_secondary_url'      => '#contact',
		'mantix_contact_heading'              => 'Request a demo',
		'mantix_contact_text'                 => 'Tell us about your business and priorities. Our team will reach out with a tailored Mantix walkthrough.',
		'mantix_contact_eyebrow'              => 'Contact',
		'mantix_contact_shortcode'            => '',
		'mantix_request_types'                => "Product Demo\nPricing Information\nImplementation Consultation\nPartnership Inquiry\nGeneral Contact",
		'mantix_form_success_message'         => 'Thanks for your request. Our team will contact you shortly.',
		'mantix_form_error_message'           => 'Please complete the required fields and try again.',
		'mantix_form_name_label'              => 'Name',
		'mantix_form_company_label'           => 'Company',
		'mantix_form_email_label'             => 'Email',
		'mantix_form_phone_label'             => 'Phone',
		'mantix_form_request_type_label'      => 'Request Type',
		'mantix_form_message_label'           => 'Message',
		'mantix_form_submit_label'            => 'Submit Request',
		'mantix_footer_summary'               => 'Mantix helps modern organizations run operations with speed, visibility, and confidence.',
		'mantix_footer_copyright'             => 'All rights reserved.',
		'mantix_footer_quick_links_title'     => 'Quick Links',
		'mantix_footer_legal_title'           => 'Legal',
		'mantix_footer_social_title'          => 'Social',
		'mantix_footer_legal_privacy_label'   => 'Privacy Policy',
		'mantix_footer_legal_privacy_url'     => '/privacy-policy/',
		'mantix_footer_legal_terms_label'     => 'Terms of Service',
		'mantix_footer_legal_terms_url'       => '/terms-and-conditions/',
		'mantix_footer_legal_cookie_label'    => 'Cookie Policy',
		'mantix_footer_legal_cookie_url'      => '/cookie-policy/',
		'mantix_social_json'                  => wp_json_encode(
			array(
				array(
					'label' => 'LinkedIn',
					'url'   => '#',
				),
				array(
					'label' => 'X',
					'url'   => '#',
				),
				array(
					'label' => 'YouTube',
					'url'   => '#',
				),
			)
		),
	);
}
