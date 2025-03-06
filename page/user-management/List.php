<?php
$users = $DB->SELECT("users", "*", "ORDER BY created_at DESC");
?>

<div class="card">
    <div class="card-body">
        <div>
            <a href="<?= Route('user-management/create') ?>" type="button" class="btn btn-primary">
                <i class="bi bi-plus"></i> Add User
            </a>
        </div>
        <table id="dataTableUsers" class="table table-hover">
            <thead class="table-secondary">
                <tr>
                    <th class="text-start">Action</th>
                    <th class="text-start">Username</th>
                    <th class="text-start">Name</th>
                    <th class="text-start">Email</th>
                    <th class="text-start">Contact</th>
                    <th class="text-start">Status</th>
                    <th class="text-start">Role</th>
                    <th class="text-end">Created</th>
                </tr>
            </thead>
            <tbody>

                <?php $i = 1;
                foreach ($users as $user) { ?>
                    <tr>
                        <td class="text-start">
                            <a href="<?= Route('user-management/details?uid=' . $user['user_id']) ?>" class="btn btn-sm btn-light"><i class="bi bi-eye"></i></a>
                        </td>
                        <td class="text-start">
                            <div class="d-flex align-items-center gap-2">
                                <img src="<?= UserImage($user['image']) ?>" class="img rounded-circle" width="30" height="30">
                                <div><?= $user['username'] ?></div>
                            </div>
                        </td>
                        <td class="text-start"><?= $user['firstname'] . ' ' . $user['lastname'] ?></td>
                        <td class="text-start"><?= $user['email'] ?></td>
                        <td class="text-start"><?= $user['contact'] ?></td>
                        <td class="text-start"><?= BadgeStatus($user['status']) ?></td>
                        <td class="text-start"><?= $user['role'] ?></td>
                        <td class="text-end"><?= FORMAT_DATE($user['created_at'], 'Y-m-d h:i A') ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

    </div>
</div>