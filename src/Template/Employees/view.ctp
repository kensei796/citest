<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Employee'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Favorite Tags'), ['controller' => 'FavoriteTags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Favorite Tag'), ['controller' => 'FavoriteTags', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Favorites'), ['controller' => 'Favorites', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Favorite'), ['controller' => 'Favorites', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lending Statuses'), ['controller' => 'LendingStatuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lending Status'), ['controller' => 'LendingStatuses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="employees view large-9 medium-8 columns content">
    <h3><?= h($employee->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pass') ?></th>
            <td><?= h($employee->pass) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($employee->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Department') ?></th>
            <td><?= $employee->has('department') ? $this->Html->link($employee->department->id, ['controller' => 'Departments', 'action' => 'view', $employee->department->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $employee->has('location') ? $this->Html->link($employee->location->id, ['controller' => 'Locations', 'action' => 'view', $employee->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($employee->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Books') ?></h4>
        <?php if (!empty($employee->books)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Employee Id') ?></th>
                <th scope="col"><?= __('Book Id') ?></th>
                <th scope="col"><?= __('Comment') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($employee->books as $books): ?>
            <tr>
                <td><?= h($books->id) ?></td>
                <td><?= h($books->employee_id) ?></td>
                <td><?= h($books->book_id) ?></td>
                <td><?= h($books->comment) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Books', 'action' => 'view', $books->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Books', 'action' => 'edit', $books->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Books', 'action' => 'delete', $books->id], ['confirm' => __('Are you sure you want to delete # {0}?', $books->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Favorite Tags') ?></h4>
        <?php if (!empty($employee->favorite_tags)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Tag Id') ?></th>
                <th scope="col"><?= __('Employee Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($employee->favorite_tags as $favoriteTags): ?>
            <tr>
                <td><?= h($favoriteTags->id) ?></td>
                <td><?= h($favoriteTags->tag_id) ?></td>
                <td><?= h($favoriteTags->employee_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'FavoriteTags', 'action' => 'view', $favoriteTags->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'FavoriteTags', 'action' => 'edit', $favoriteTags->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FavoriteTags', 'action' => 'delete', $favoriteTags->id], ['confirm' => __('Are you sure you want to delete # {0}?', $favoriteTags->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Favorites') ?></h4>
        <?php if (!empty($employee->favorites)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Employee Id') ?></th>
                <th scope="col"><?= __('Book Id') ?></th>
                <th scope="col"><?= __('Book Info Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($employee->favorites as $favorites): ?>
            <tr>
                <td><?= h($favorites->id) ?></td>
                <td><?= h($favorites->employee_id) ?></td>
                <td><?= h($favorites->book_id) ?></td>
                <td><?= h($favorites->book_info_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Favorites', 'action' => 'view', $favorites->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Favorites', 'action' => 'edit', $favorites->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Favorites', 'action' => 'delete', $favorites->id], ['confirm' => __('Are you sure you want to delete # {0}?', $favorites->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Lending Statuses') ?></h4>
        <?php if (!empty($employee->lending_statuses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Book Id') ?></th>
                <th scope="col"><?= __('Employee Id') ?></th>
                <th scope="col"><?= __('From Date') ?></th>
                <th scope="col"><?= __('To Date') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Returned Flag') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($employee->lending_statuses as $lendingStatuses): ?>
            <tr>
                <td><?= h($lendingStatuses->id) ?></td>
                <td><?= h($lendingStatuses->book_id) ?></td>
                <td><?= h($lendingStatuses->employee_id) ?></td>
                <td><?= h($lendingStatuses->from_date) ?></td>
                <td><?= h($lendingStatuses->to_date) ?></td>
                <td><?= h($lendingStatuses->created) ?></td>
                <td><?= h($lendingStatuses->returned_flag) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'LendingStatuses', 'action' => 'view', $lendingStatuses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'LendingStatuses', 'action' => 'edit', $lendingStatuses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'LendingStatuses', 'action' => 'delete', $lendingStatuses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lendingStatuses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
