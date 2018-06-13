@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li>
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            <li v-if="$can('client_access')">
                <router-link :to="{ name: 'clients.index' }">
                    <i class="fa fa-user-plus"></i>
                    <span>@lang('quickadmin.clients.title')</span>
                </router-link>
            </li>
            <li v-if="$can('project_access')">
                <router-link :to="{ name: 'projects.index' }">
                    <i class="fa fa-suitcase"></i>
                    <span>@lang('quickadmin.projects.title')</span>
                </router-link>
            </li>
            <li v-if="$can('note_access')">
                <router-link :to="{ name: 'notes.index' }">
                    <i class="fa fa-wechat"></i>
                    <span>@lang('quickadmin.notes.title')</span>
                </router-link>
            </li>
            <li v-if="$can('document_access')">
                <router-link :to="{ name: 'documents.index' }">
                    <i class="fa fa-file-text"></i>
                    <span>@lang('quickadmin.documents.title')</span>
                </router-link>
            </li>
            <li v-if="$can('transaction_access')">
                <router-link :to="{ name: 'transactions.index' }">
                    <i class="fa fa-credit-card-alt"></i>
                    <span>@lang('quickadmin.transactions.title')</span>
                </router-link>
            </li>
            <li>
                <router-link :to="{ name: 'reports.index' }">
                    <i class="fa fa-bar-chart"></i>
                    <span class="title">@lang('quickadmin.reports.title')</span>
                </router-link>
            </li>
            <li class="treeview" v-if="$can('setting_access')">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.settings.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li v-if="$can('currency_access')">
                        <router-link :to="{ name: 'currencies.index' }">
                            <i class="fa fa-money"></i>
                            <span>@lang('quickadmin.currencies.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('transaction_type_access')">
                        <router-link :to="{ name: 'transaction_types.index' }">
                            <i class="fa fa-exchange"></i>
                            <span>@lang('quickadmin.transaction-types.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('income_source_access')">
                        <router-link :to="{ name: 'income_sources.index' }">
                            <i class="fa fa-database"></i>
                            <span>@lang('quickadmin.income-sources.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('client_status_access')">
                        <router-link :to="{ name: 'client_statuses.index' }">
                            <i class="fa fa-server"></i>
                            <span>@lang('quickadmin.client-statuses.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('project_status_access')">
                        <router-link :to="{ name: 'project_statuses.index' }">
                            <i class="fa fa-server"></i>
                            <span>@lang('quickadmin.project-statuses.title')</span>
                        </router-link>
                    </li>
                </ul>
            </li>
            <li class="treeview" v-if="$can('user_management_access')">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li v-if="$can('permission_access')">
                        <router-link :to="{ name: 'permissions.index' }">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('quickadmin.permissions.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('role_access')">
                        <router-link :to="{ name: 'roles.index' }">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('quickadmin.roles.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('user_access')">
                        <router-link :to="{ name: 'users.index' }">
                            <i class="fa fa-user"></i>
                            <span>@lang('quickadmin.users.title')</span>
                        </router-link>
                    </li>
                </ul>
            </li>

            <li>
                <router-link :to="{ name: 'user_actions.index' }">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-actions.title')</span>
                </router-link>
            </li>

            <li>
                <router-link :to="{ name: 'auth.change_password' }">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </router-link>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
