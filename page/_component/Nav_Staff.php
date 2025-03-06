<?=
NavItem([
    'label' => 'BCP News Update',
    'url' => route('#'),
    'icon' => 'bi bi-newspaper'
]);
?>

<?=
NavItem([
    'label' => 'Goal Target',
    'url' => route('#'),
    'icon' => 'bi bi-bullseye'
]);
?>

<?=
NavItem([
    'label' => 'Notification',
    'url' => route('#'),
    'icon' => 'bi bi-bell'
]);
?>

<?=
NavItem([
    'label' => 'Special Report </br>Submission',
    'url' => route('#'),
    'icon' => 'bi bi-file-earmark-text'
]);
?>

<?=
NavItem([
    'label' => 'Recruitment </br>Management',
    'icon' => 'bi bi-people',
    'children' => [
        ['label' => 'Job Posting', 'url' => route('#'), 'icon' => 'bi bi-briefcase'],
        ['label' => 'Applicant Tracking', 'url' => route('#'), 'icon' => 'bi bi-person-check'],
        ['label' => 'Recruitment Reports', 'url' => route('#'), 'icon' => 'bi bi-file-earmark-bar-graph'],
    ],
]);
?>

<?=
NavItem([
    'label' => 'Onboarding </br>Management',
    'icon' => 'bi bi-person-lines-fill',
    'children' => [
        ['label' => 'Onboarding Workflow', 'url' => route('#'), 'icon' => 'bi bi-arrow-right-circle'],
        ['label' => 'Orientation Scheduling', 'url' => route('#'), 'icon' => 'bi bi-calendar-check'],
        ['label' => 'Applicant Progress Tracking', 'url' => route('#'), 'icon' => 'bi bi-bar-chart'],
    ],
]);
?>

<?=
NavItem([
    'label' => 'Employee </br>Management',
    'icon' => 'bi bi-person-fill',
    'children' => [
        ['label' => 'Employee List </br>Management', 'url' => route('#'), 'icon' => 'bi bi-list-ul'],
        ['label' => 'Employee Relations', 'url' => route('#'), 'icon' => 'bi bi-chat-left-dots'],
        ['label' => 'Performance </br>Management', 'url' => route('#'), 'icon' => 'bi bi-graph-up'],
    ],
]);
?>

<?=
NavItem([
    'label' => 'Training & </br>Development',
    'icon' => 'bi bi-person-workspace',
    'children' => [
        ['label' => 'Training </br>Management', 'url' => route('#'), 'icon' => 'bi bi-book'],
        ['label' => 'New-Hired Onboard', 'url' => route('#'), 'icon' => 'bi bi-person-plus'],
    ],
]);
?>

<?=
NavItem([
    'label' => 'Hiring and Integration',
    'icon' => 'bi bi-check-circle',
    'children' => [
        ['label' => 'Hiring Decision', 'url' => route('#'), 'icon' => 'bi bi-check-square'],
        ['label' => 'Certified Regular </br>Employee', 'url' => route('#'), 'icon' => 'bi bi-person-check'],
        ['label' => 'Integration', 'url' => route('#'), 'icon' => 'bi bi-arrow-right-square'],
    ],
]);
?>

