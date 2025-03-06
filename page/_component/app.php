<?php

define("USER_IMAGE", DOMAIN."/upload/profile/".AUTH_USER['image']);


function UserImage($user){
    return DOMAIN."/upload/user/".$user;
}

function UserAvatar()
{
    return '<img src="' . (!empty(USER_IMAGE) ? USER_IMAGE : Route('upload/user/default.png')) . '" class="rounded-circle" alt="image" id="profileImage" />';
}

function Loading($text = null){
    ?>
        <div class="d-flex justify-content-center py-2">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    <?php
}

function BreadCrumb(array $items){
    $html = "<ol class='breadcrumb'>";
    foreach ($items as $i => $item) {
        $class = $i === count($items) - 1 ? ' active' : '';
        $link = isset($item['url']) ? "<a href='{$item['url']}'>{$item['label']}</a>" : $item['label'];
        $html .= "<li class='breadcrumb-item{$class}'>{$link}</li>";
    }
    $html .= "</ol>";
    echo $html;
}

function BadgeStatus($status)
{
    switch ($status) {
        case 'Pending':
        case 'Draft':
        case 'UPDATE':
            $classes = 'bg-warning'; // Bootstrap 5 warning background class
            break;
        case 'Approved':
        case 'Finalized':
            $classes = 'bg-success'; // Bootstrap 5 primary background class
            break;
        case 'Rejected':
        case 'Declined':
        case 'Inactive':
        case 'Closed':
        case 'Expired':
        case 'High':
        case 'Cancelled':
        case 'Critical':
        case 'DELETE':
            $classes = 'bg-danger'; // Bootstrap 5 danger background class
            break;
        case 'Low':
        case 'In Progress':
            $classes = 'bg-warning'; // Bootstrap 5 warning background class
            break;
        case 'Active':
        case 'Open':
        case 'Awarded':
        case 'Accepted':
        case 'Renewed':
        case 'Signed':
        case 'Delivered':
        case 'Completed':
        case 'Paid':
        case 'INSERT':
            $classes = 'bg-success'; // Bootstrap 5 primary background class
            break;
        default:
            $classes = 'bg-secondary'; // Bootstrap 5 secondary background class
    }

    // Return the badge HTML with the appropriate background classes
    return '<span class="badge ' . $classes . '">' . htmlspecialchars($status, ENT_QUOTES, 'UTF-8') . '</span>';
}


function NavItem($level) {
    // Check if URL is set, otherwise default to '#'
    $url = isset($level['url']) ? $level['url'] : '#';
    
    // Check if an icon is specified for the main level, otherwise use a default icon (bi-circle)
    $icon = isset($level['icon']) ? $level['icon'] : 'bi bi-circle';  // Default to bi-circle
    
    // Define the base structure for the nav item
    $navHTML = '<li class="nav-item">
                    <a href="' . $url . '" class="nav-link">';
    
    // Add the custom icon for the main level
    $navHTML .= '<i class="nav-icon ' . $icon . '"></i>';  // Use the passed icon or default
    $navHTML .= '<p>' . $level['label'];

    // If there are children (sub-levels), add a dropdown icon
    if (isset($level['children']) && !empty($level['children'])) {
        $navHTML .= ' <i class="nav-arrow bi bi-chevron-right"></i>';
    }

    $navHTML .= '</p></a>';
                    
    // Check if there are sub-items (children) and render them if present
    if (isset($level['children']) && !empty($level['children'])) {
        $navHTML .= '<ul class="nav nav-treeview">';
        foreach ($level['children'] as $child) {
            $childUrl = isset($child['url']) ? $child['url'] : '#'; // Default URL for children
            $childIcon = isset($child['icon']) ? $child['icon'] : 'bi bi-circle'; // Default child icon
            
            // Render the child item with its icon
            $navHTML .= '<li class="nav-item">
                            <a href="' . $childUrl . '" class="nav-link">
                                <i class="nav-icon ' . $childIcon . '"></i> <!-- Child icon -->
                                <p>' . $child['label'] . '</p>
                            </a>
                          </li>';
        }
        $navHTML .= '</ul>';
    }

    // Close the main list item
    $navHTML .= '</li>';
    
    return $navHTML;
}


