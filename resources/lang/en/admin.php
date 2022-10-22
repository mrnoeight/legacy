<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'talent-user' => [
        'title' => 'Talent Users',

        'actions' => [
            'index' => 'Talent Users',
            'create' => 'New Talent User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'hometown' => 'Hometown',
            'birthday' => 'Birthday',
            'current_career' => 'Current career',
            'has_agency' => 'Has agency',
            'agency_name' => 'Agency name',
            'want_agency' => 'Want agency',
            'your_experience' => 'Your experience',
            'socials' => 'Socials',
            'searching_for' => 'Searching for',
            'profile_picture' => 'Profile picture',
            'file_cv' => 'File cv',
            'weight' => 'Weight',
            'height' => 'Height',
            
        ],
    ],

    'tag' => [
        'title' => 'Tags',

        'actions' => [
            'index' => 'Tags',
            'create' => 'New Tag',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'tag_name' => 'Tag name',
            
        ],
    ],

    'film' => [
        'title' => 'Films',

        'actions' => [
            'index' => 'Films',
            'create' => 'New Film',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'company' => [
        'title' => 'Company',

        'actions' => [
            'index' => 'Company',
            'create' => 'New Company',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'representative' => 'Representative',
            'tel' => 'Tel',
            'address' => 'Address',
            'city' => 'City',
            'enabled' => 'Enabled',
            
        ],
    ],

    'post' => [
        'title' => 'Projects',

        'actions' => [
            'index' => 'Projects',
            'create' => 'New Project',
            'edit' => 'Edit :name',
            'will_be_published' => 'Project will be published at',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Title',
            'slug' => 'Slug',
            'type' => 'Type',
            'city' => 'City',
            'gender' => 'Gender',
            'project_budget' => 'Budget',
            'other_location' => 'Other Location',
            'start_casting_date' => 'Start Casting Date',
            'end_casting_date' => 'End Casting Date',
            'start_rehearsal_date' => 'Start Rehearsal Date',
            'end_rehearsal_date' => 'End Rehearsal Date',
            'start_photo_date' => 'Start Shooting Photo Date',
            'end_photo_date' => 'End Shooting Photo Date',
            'age' => 'Age',
            'company_id' => 'Company',
            'expired_date' => 'Deadline',
            'description' => 'Summary',
            'published_at' => 'Published at',
            'enabled' => 'Enabled',
            
        ],
    ],

    'homepage' => [
        'title' => 'Homepage',

        'actions' => [
            'index' => 'Homepage',
            'create' => 'New Homepage',
            'edit' => 'Edit Homepage',
            'will_be_published' => 'Project will be published at',
        ],
        
        'columns' => [
            'id' => 'ID',
            'head_tag1' => 'Heading Tag',
            'head_title1' => 'Heading Title',
            'head_desc1' => 'Heading Description',
            'mid_tag1' => 'Middle Tag',
            'mid_title1' => 'Middle Title',
            'mid_desc1' => 'Middle Description',
            'info1' => 'Info 1',
            'info2' => 'Info 2',
            'info3' => 'Info 3',
            'info4' => 'Info 4',
            'info5' => 'Info 5',
            'seo_title' => 'SEO Title',
            'seo_description' => 'SEO Description',
            'page_name' => 'Page Name',
            'published_at' => 'Published at',
            'enabled' => 'Enabled',
            
        ],
    ],

    'block-info' => [
        'title' => 'Block Info',

        'actions' => [
            'index' => 'Block Info',
            'create' => 'New Block Info',
            'edit' => 'Edit :name',
            'will_be_published' => 'Project will be published at',
        ],
        
        'columns' => [
            'id' => 'ID',
            'head_tag1' => 'Heading Tag',
            'head_title1' => 'Heading Title',
            'head_desc1' => 'Heading Description',
            'info1' => 'Info 1',
            'block_name' => 'Block Name',
            'block_type' => 'Block Type',
            'published_at' => 'Published at',
            'enabled' => 'Enabled',
        ],
    ],

    'prole' => [
        'title' => 'Roles',

        'actions' => [
            'index' => 'Roles',
            'create' => 'New Role',
            'edit' => 'Edit :name',
            'will_be_published' => 'Role will be published at',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Title',
            'slug' => 'Slug',
            'type' => 'Type',
            'city' => 'City',
            'gender' => 'Gender',
            'role_type' => 'Role Type',
            'role_requirement' => 'Requirement',
            'age_range' => 'Age Range',
            'role_fee_min' => 'Role Fee Minimum',
            'role_fee_max' => 'Role Fee Maximum',
            'summary' => 'Summary',
            'note' => 'Note',
            'start_photo_date' => 'Start Shooting Photo Date',
            'end_photo_date' => 'End Shooting Photo Date',
            'age' => 'Age',
            'company_id' => 'Company',
            'expired_date' => 'Deadline',
            'description' => 'Summary',
            'published_at' => 'Published at',
            'enabled' => 'Enabled',
            
        ],
    ],

    'event' => [
        'title' => 'Events',

        'actions' => [
            'index' => 'Events',
            'create' => 'New Event',
            'edit' => 'Edit :name',
            'will_be_published' => 'Event will be published at',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'short_desc' => 'Short desc',
            'description' => 'Description',
            'published_at' => 'Published at',
            'enabled' => 'Enabled',
            
        ],
    ],

    'city' => [
        'title' => 'Cities',

        'actions' => [
            'index' => 'Cities',
            'create' => 'New City',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'weight' => 'Weight',
            'country_id' => 'Country',
            'country_code' => 'Country code',
            
        ],
    ],

    'film' => [
        'title' => 'Films',

        'actions' => [
            'index' => 'Films',
            'create' => 'New Film',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'title' => 'Title',
            'description' => 'Description',
            
        ],
    ],

    'page' => [
        'title' => 'Pages',

        'actions' => [
            'index' => 'Pages',
            'create' => 'New Page',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'page' => [
        'title' => 'Pages',

        'actions' => [
            'index' => 'Pages',
            'create' => 'New Page',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'web_title' => 'Web title',
            'web_description' => 'Web description',
            'content' => 'Content',
            'enabled' => 'Enabled',
            
        ],
    ],

    'registration' => [
        'title' => 'Registrations',

        'actions' => [
            'index' => 'Registrations',
            'create' => 'New Registration',
            'edit' => 'Edit :name',
            'will_be_published' => 'Registration will be published at',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'hometown' => 'Hometown',
            'birthday' => 'Birthday',
            'current_career' => 'Current career',
            'has_agency' => 'Has agency',
            'agency_name' => 'Agency name',
            'want_agency' => 'Want agency',
            'your_experience' => 'Your experience',
            'searching_for' => 'Searching for',
            'youtube_link' => 'Youtube link',
            'facebook_link' => 'Facebook link',
            'instagram_link' => 'Instagram link',
            'tiktok_link' => 'Tiktok link',
            'weight' => 'Weight',
            'height' => 'Height',
            'type' => 'Type',
            'status' => 'Status',
            'enabled' => 'Enabled',
            'bio' => 'Bio',
            'published_at' => 'Published at',
            'username' => 'Username',
            'password' => 'Password',
            
        ],
    ],

    'block' => [
        'title' => 'Blocks',

        'actions' => [
            'index' => 'Blocks',
            'create' => 'New Block',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'title' => 'Title',
            'content' => 'Content',
            'url' => 'Url',
            'page' => 'Page',
            'section' => 'Section',
            'enabled' => 'Enabled',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];