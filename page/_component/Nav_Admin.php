<?=
NavItem([
    'label' => 'BCP News Update',
    'url' => ROUTE('bcp-news-update'), // Dummy route
    'icon' => 'bi bi-newspaper'
]);
?>

<?=
NavItem([
    'label' => 'Goal Target',
    'url' => ROUTE('goal-target'), // Dummy route
    'icon' => 'bi bi-bullseye'
]);
?>

<?=
NavItem([
    'label' => 'Notification',
    'url' => ROUTE('notifications'), // Dummy route
    'icon' => 'bi bi-bell'
]);
?>

<?=
NavItem([
    'label' => 'Special Report </br>Submission',
    'url' => ROUTE('special-report-submission'), // Dummy route
    'icon' => 'bi bi-file-earmark-text'
]);
?>

<?=
NavItem([
    'label' => 'Recruitment </br>Management',
    'icon' => 'bi bi-people',
    'children' => [
        ['label' => 'Job Posting', 'url' => ROUTE('job-posting'), 'icon' => 'bi bi-briefcase'], // Dummy route
        ['label' => 'Applicant Tracking', 'url' => ROUTE('application-track'), 'icon' => 'bi bi-person-check'], // Dummy route
    ],
]);
?>

<?=
NavItem([
    'label' => 'Onboarding </br>Management',
    'icon' => 'bi bi-person-lines-fill',
    'children' => [
        ['label' => 'Onboarding Workflow', 'url' => ROUTE('onboarding-workflow'), 'icon' => 'bi bi-arrow-right-circle'], // Dummy route
        ['label' => 'Orientation Scheduling', 'url' => ROUTE('orientation-scheduling'), 'icon' => 'bi bi-calendar-check'], // Dummy route
    ],
]);
?>

<?=
NavItem([
    'label' => 'Employee </br>Management',
    'icon' => 'bi bi-person-fill',
    'children' => [
        ['label' => 'Employee List </br>Management', 'url' => ROUTE('employee-list-management'), 'icon' => 'bi bi-list-ul'], // Dummy route
        ['label' => 'Employee Relations', 'url' => ROUTE('employee-relations'), 'icon' => 'bi bi-chat-left-dots'], // Dummy route
        ['label' => 'Performance </br>Management', 'url' => ROUTE('performance-management'), 'icon' => 'bi bi-graph-up'], // Dummy route
    ],
]);
?>

<?=
NavItem([
    'label' => 'Training & </br>Development',
    'icon' => 'bi bi-person-workspace',
    'children' => [
        ['label' => 'Training </br>Management', 'url' => ROUTE('training-management'), 'icon' => 'bi bi-book'], // Dummy route
        ['label' => 'New-Hired Onboard', 'url' => ROUTE('new-hired-onboard'), 'icon' => 'bi bi-person-plus'], // Dummy route
    ],
]);
?>

<?=
NavItem([
    'label' => 'Hiring and Integration',
    'icon' => 'bi bi-check-circle',
    'children' => [
        ['label' => 'Hiring Decision', 'url' => ROUTE('hiring-decision'), 'icon' => 'bi bi-check-square'], // Dummy route
        ['label' => 'Certified Regular </br>Employee', 'url' => ROUTE('certified-regular-employee'), 'icon' => 'bi bi-person-check'], // Dummy route
        ['label' => 'Integration', 'url' => ROUTE('integration'), 'icon' => 'bi bi-arrow-right-square'], // Dummy route
    ],
]);
?>

<?=
NavItem([
    'label' => 'Users Management',
    'url' => ROUTE('user-management'), // Real route
    'icon' => 'bi bi-person-lines-fill'
]);
?>
