<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Support\Facades\Gate;

Breadcrumbs::for('dashboard.centers.index', function ($trail, $data) {
    $trail->parent('dashboard.home', $data);
    $trail->push(__('Therapy centers'), route('dashboard.centers.index'));
});

Breadcrumbs::for('dashboard.centers.create', function ($trail, $data) {
    $trail->parent('dashboard.centers.index', $data);
    $trail->push(__('Create new center'), route('dashboard.centers.create'));
});

Breadcrumbs::for('dashboard.centers.show', function ($trail, $data) {
    $trail->parent('dashboard.centers.index', $data);
    $trail->push($data['center']->detail->title, route('dashboard.centers.show', $data['center']->id));
});

Breadcrumbs::for('dashboard.centers.edit', function ($trail, $data) {
    $trail->parent('dashboard.centers.show', $data);
    $trail->push(__('Edit'), route('dashboard.centers.edit', $data['center']->id));
});

Breadcrumbs::for('dashboard.center.users.index', function ($trail, $data) {
    $trail->parent('dashboard.centers.show', $data);
        $trail->push(
            __('Users'),
            Gate::allows('viewAny', [App\CenterUser::class, $data['center']]) ? route('dashboard.center.users.index', $data['center']->id) : null
    );
});
Breadcrumbs::for('dashboard.center.users.show', function ($trail, $data) {
    $trail->parent('dashboard.center.users.index', $data);
    $trail->push(
        $data['center'] && $data['center']->acceptation && $data['center']->acceptation->id == $data['user']->id ? __('My profile') : ($data['user']->name ?: $data['user']->id),
        route('dashboard.center.users.show', ['center' => $data['center']->id, 'user' => $data['user']->id]));
});

Breadcrumbs::for('dashboard.center.users.edit', function ($trail, $data) {
    $trail->parent('dashboard.center.users.show', $data);
    $trail->push(
        __('Edit'),
        route('dashboard.center.users.edit', ['center' => $data['center']->id, 'user' => $data['user']->id]));
});

Breadcrumbs::for('dashboard.center.users.create', function ($trail, $data) {
    $trail->parent('dashboard.center.users.index', $data);
    $trail->push(__('Join new user'), route('dashboard.center.users.create', $data['center']->id));
});


Breadcrumbs::for('dashboard.assessments.index', function ($trail, $data) {
    $trail->parent('dashboard.home', $data);
    $trail->push(__('Assessments'), route('dashboard.assessments.index'));
});

Breadcrumbs::for('dashboard.samples.index', function ($trail, $data) {
    $trail->parent('dashboard.assessments.index', $data);
    $trail->push(__('Samples'), route('dashboard.samples.index'));
});

Breadcrumbs::for('dashboard.samples.show', function ($trail, $data) {
    if($data['sample']->case){
        $trail->parent('dashboard.cases.show', $data);
    }else{
        if($data['sample']->client){
            $data['user'] = $data['sample']->client;
            $trail->parent('dashboard.center.users.show', $data);
        }else{
            $trail->parent('dashboard.rooms.show', $data);
        }
    }
    $trail->push(__('Samples'), null);
    $trail->push($data['sample']->id, route('dashboard.samples.show', $data['sample']->id));
});
Breadcrumbs::for('dashboard.samples.create', function ($trail, $data) {
    $trail->parent('dashboard.samples.index', $data);
    $trail->push(__('Create new sampel'), route('dashboard.samples.index'));
});


Breadcrumbs::for('dashboard.rooms.index', function ($trail, $data) {
    $trail->parent('dashboard.home', $data);
    if(isset($data['center']))
    {
        $trail->push($data['center']->detail->title, route('dashboard.centers.show', $data['center']->id));
    }
    $trail->push(__('Therapy rooms'), route('dashboard.rooms.index'));
});

Breadcrumbs::for('dashboard.center.rooms.create', function ($trail, $data) {
    $trail->parent('dashboard.centers.show', $data);
    $trail->push(__('Create new room'), route('dashboard.center.rooms.create', ['center' => $data['center']]));
});

Breadcrumbs::for('dashboard.rooms.show', function ($trail, $data) {
    $trail->parent('dashboard.centers.show', $data);
    $trail->push($data['room']->type == 'room' ? __('Therapy room of :user', ['user' => $data['room']->manager->name]) : __('Personal'), route('dashboard.rooms.show', $data['room']->id));
});

Breadcrumbs::for('dashboard.room.users.index', function ($trail, $data) {
    $trail->parent('dashboard.rooms.show', $data);
    $trail->push(__(':type users', ['type' => __('Therapy room')]), route('dashboard.rooms.index'));
});

Breadcrumbs::for('dashboard.room.users.create', function ($trail, $data) {
    $trail->parent('dashboard.room.users.index', $data);
    $trail->push(__('Create new room-user'), route('dashboard.room.users.create', request()->route()->parameters['room']));
});

Breadcrumbs::for('dashboard.reserves.index', function ($trail, $data) {
    $trail->parent('dashboard.home', $data);
    $trail->push(__('Reservation'), route('dashboard.reserves.index'));
});
Breadcrumbs::for('dashboard.reserves.create', function ($trail, $data) {
    $trail->parent('dashboard.reserves.index', $data);
    $trail->push(__('Create new reserve'), route('dashboard.reserves.create'));
});


Breadcrumbs::for('dashboard.sessions.index', function ($trail, $data) {
    if(isset($data['case'])){
        $trail->parent('dashboard.cases.show', $data);
    }else{
        $trail->parent('dashboard.home', $data);
    }

    $trail->push(__('Sessions'), null);
});
Breadcrumbs::for('dashboard.sessions.edit', function ($trail, $data) {
    $trail->parent('dashboard.sessions.show', $data);
    $trail->push(__('Edit'), route('dashboard.sessions.edit', $data['session']->route('edit')));
});
Breadcrumbs::for('dashboard.cases.show', function ($trail, $data) {
    $trail->parent('dashboard.rooms.show', $data);
    $trail->push(__('Case'), null);
    $trail->push($data['case']->id, $data['case']->route('show'));
});

Breadcrumbs::for('dashboard.case.users.create', function ($trail, $data) {
    $trail->parent('dashboard.cases.show', $data);
    $trail->push(__('Join new user'), route('dashboard.case.users.create', $data['case']->id));
});

Breadcrumbs::for('dashboard.sessions.show', function ($trail, $data) {
    if(isset($data['case'])){
        $trail->parent('dashboard.cases.show', $data);
    }else{
        $trail->parent('dashboard.rooms.show', $data);
    }
    $trail->push(__('Session'), null);
    $trail->push($data['session']->id, $data['session']->route('show'));
});
Breadcrumbs::for('dashboard.sessions.report.create', function ($trail, $data) {
    $trail->parent('dashboard.sessions.show', $data);
    $trail->push(__('Report'), route('dashboard.sessions.report.create', $data['session']->id));
});
Breadcrumbs::for('dashboard.sessions.practices.create', function ($trail, $data) {
    $trail->parent('dashboard.sessions.show', $data);
    $trail->push(__('Create new practice'), route('dashboard.sessions.practices.create', $data['session']->id));
});

Breadcrumbs::for('dashboard.room.cases.create', function ($trail, $data) {
    $trail->parent('dashboard.rooms.show', $data);
    $trail->push(__("Create new case"), route('dashboard.room.cases.create', $data['room']->id));
});


Breadcrumbs::for('dashboard.cases.index', function ($trail, $data) {
    $trail->parent('dashboard.home', $data);

    $trail->push(__('Cases'), route('dashboard.cases.index'));
});

Breadcrumbs::for('dashboard.bulk-samples.index', function ($trail, $data) {
    $trail->parent('dashboard.home', $data);

    $trail->push(__('Bulk samples'), route('dashboard.bulk-samples.index'));
});
Breadcrumbs::for('dashboard.bulk-samples.show', function ($trail, $data) {
    $trail->parent('dashboard.bulk-samples.index', $data);

    $trail->push($data['bulkSample']->title ?: $data['bulkSample']->id, route('dashboard.bulk-samples.show', $data['bulkSample']->id));
});

Breadcrumbs::for('dashboard.center.schedules.index', function ($trail, $data) {
    $trail->parent('dashboard.centers.show', $data);

    $trail->push(__('Therapy Schedules'), route('dashboard.center.schedules.index', $data['center']->id));
});

Breadcrumbs::for('dashboard.room.schedules.create', function ($trail, $data) {
    $trail->parent('dashboard.room.schedules.index', $data);

    $trail->push(__('Define new schedule'), route('dashboard.room.schedules.create', $data['room']->id));
});

Breadcrumbs::for('dashboard.room.schedules.index', function ($trail, $data) {
    if(isset($data['case'])){
        $trail->parent('dashboard.cases.show', $data);
    }else{
        $trail->parent('dashboard.rooms.show', $data);
    }

    $trail->push(__('Center Therapy Schedules'), route('dashboard.center.schedules.index', $data['center']->id));
    $trail->push(__('Therapy Schedules'), route('dashboard.room.schedules.index', $data['room']->id));
});

Breadcrumbs::for('dashboard.case.schedules.create', function ($trail, $data) {
    $trail->parent('dashboard.cases.show', $data);

    $trail->push(__('Create new session'), route('dashboard.case.schedules.create', $data['case']->id));
});

Breadcrumbs::for('dashboard.schedules.show', function ($trail, $data) {
    $trail->parent('dashboard.room.schedules.index', $data);

    $trail->push(__('Reserve'), route('dashboard.schedules.show', $data['session']->id));
});

Breadcrumbs::for('dashboard.treasuries.index', function ($trail, $data) {
    $trail->parent('dashboard.home', $data);
    $trail->push(__('Treasuries'), route('dashboard.treasuries.index'));
});

Breadcrumbs::for('dashboard.treasuries.show', function ($trail, $data) {
    $trail->parent('dashboard.treasuries.index', $data);
    $trail->push($data['treasury']->title, route('dashboard.treasuries.show', $data['treasury']->id));
});
Breadcrumbs::for('dashboard.treasuries.edit', function ($trail, $data) {
    $trail->parent('dashboard.treasuries.show', $data);
    $trail->push(__('Edit'), route('dashboard.treasuries.edit', $data['treasury']->id));
});

Breadcrumbs::for('dashboard.billings.index', function ($trail, $data) {
    $trail->parent('dashboard.home', $data);
    $trail->push(__('Billings'), route('dashboard.billings.index'));
});
Breadcrumbs::for('dashboard.billings.show', function ($trail, $data) {
    $trail->parent('dashboard.billings.index', $data);
    $trail->push($data['billing']->id .' - '.$data['billing']->title, route('dashboard.billings.show', $data['billing']));
});

Breadcrumbs::for('dashboard.client-reports.index', function ($trail, $data) {
    if(isset($data['session'])){
        $trail->parent('dashboard.sessions.show', $data);
        $trail->push(__('Reports'), route('dashboard.client-reports.index', $data['session']->id));
    }elseif(isset($data['case'])){
        $trail->parent('dashboard.cases.show', $data);
        $trail->push(__('Reports'), route('dashboard.client-reports.index', $data['case']->id));
    }
});
Breadcrumbs::for('dashboard.client-reports.show', function ($trail, $data) {
    $trail->parent('dashboard.client-reports.index', $data);
    $trail->push($data['report']->title, route('dashboard.client-reports.show', $data['report']->id));
});
Breadcrumbs::for('dashboard.client-reports.create', function ($trail, $data) {
    $trail->parent('dashboard.client-reports.index', $data);
    $trail->push(__('Create client report'), null);
});


Breadcrumbs::for('dashboard.center.setting.session-platforms', function ($trail, $data) {
    $trail->parent('dashboard.centers.show', $data);
    $trail->push(__('Platform settings'), route('dashboard.center.setting.session-platforms', $data['center']->id));
});

Breadcrumbs::for('dashboard.center.setting.session-platforms.create', function ($trail, $data) {
    $trail->parent('dashboard.center.setting.session-platforms', $data);
    $trail->push(__('Create session-platform'), route('dashboard.center.setting.session-platforms.create', $data['center']->id));
});

Breadcrumbs::for('dashboard.center.setting.session-platforms.edit', function ($trail, $data) {
    $trail->parent('dashboard.center.setting.session-platforms', $data);
    $trail->push($data['platform']->title, route('dashboard.center.setting.session-platforms.edit', [$data['center']->id, $data['platform']->id]));
});


Breadcrumbs::for('dashboard.room.setting.session-platforms', function ($trail, $data) {
    $trail->parent('dashboard.rooms.show', $data);
    $trail->push(__('Platform settings'), route('dashboard.room.setting.session-platforms', $data['room']->id));
});


Breadcrumbs::for('dashboard.room.setting.tags.show', function ($trail, $data) {
    $trail->parent('dashboard.rooms.show', $data);
    $trail->push(__('Tags settings'), route('dashboard.room.setting.tags.show', $data['room']->id));
});

Breadcrumbs::for('dashboard.center.accounting.index', function ($trail, $data) {
    $trail->parent('dashboard.centers.show', $data);
    $trail->push(__('Accounting'), route('dashboard.center.accounting.index', $data['center']->id));
});

Breadcrumbs::for('dashboard.center.commissions.index', function ($trail, $data) {
    $trail->parent('dashboard.center.accounting.index', $data);
    $trail->push(__('کمیسیون اتاق‌های مرکز'), route('dashboard.center.commissions.index', $data['center']->id));
});

Breadcrumbs::for('dashboard.center.balanceSheets.index', function ($trail, $data) {
    $trail->parent('dashboard.center.accounting.index', $data);
    $trail->push(__('تراز مالی اتاق‌های مرکز'), route('dashboard.center.balanceSheets.index', $data['center']->id));
});

Breadcrumbs::for('dashboard.center.balanceSheets.show', function ($trail, $data) {
    $trail->parent('dashboard.center.balanceSheets.index', $data);
    $trail->push($data['room']->manager->name, route('dashboard.center.balanceSheets.show', $data['room']->id));
});
Breadcrumbs::for('dashboard.room.billings.index', function ($trail, $data) {
    $trail->parent('dashboard.center.balanceSheets.index', $data);
    $trail->push($data['room']->manager->name, route('dashboard.room.billings.index', $data['room']->id));
});


Breadcrumbs::for('dashboard.billings.create', function ($trail, $data) {
    switch(get_class($data['model'])){
        case 'App\Session' :
            $trail->parent('dashboard.sessions.show', $data);
            $trail->push(__('ساخت فاکتور'), route('dashboard.billings.create', $data['session']->id));
    }
});

Breadcrumbs::for('dashboard.gifts.index', function ($trail, $data) {
    $trail->parent('dashboard.center.accounting.index', $data);
    $trail->push(__('Gifts'), route('dashboard.gifts.index', ['center' => $data['center']->id]));
});

Breadcrumbs::for('dashboard.gifts.create', function ($trail, $data) {
    $trail->parent('dashboard.gifts.index', $data);
    $trail->push(__('ساخت کد تخفیف'), route('dashboard.gifts.create', ['center' => $data['center']->id]));
});

Breadcrumbs::for('dashboard.gifts.show', function ($trail, $data) {
    $trail->parent('dashboard.gifts.index', $data);
    $trail->push($data['gift']->title, route('dashboard.gifts.show', ['center' => $data['center'], 'gift'=> $data['gift']->id]));
});
Breadcrumbs::for('dashboard.gifts.edit', function ($trail, $data) {
    $trail->parent('dashboard.gifts.show', $data);
    $trail->push(__('ویرایش'), route('dashboard.gifts.edit', ['center' => $data['center'], 'gift'=> $data['gift']->id]));
});
Breadcrumbs::for('dashboard.gifts.appendUserForm', function ($trail, $data) {
    $trail->parent('dashboard.gifts.show', $data);
    $trail->push(__('افزودن کاربر'), route('dashboard.gifts.appendUserForm', ['center' => $data['center'], 'gift'=> $data['gift']->id]));
});
