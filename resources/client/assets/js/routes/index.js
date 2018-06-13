import Vue from 'vue'
import VueRouter from 'vue-router'

import ChangePassword from '../components/ChangePassword.vue'
import ClientsIndex from '../components/cruds/Clients/Index.vue'
import ClientsCreate from '../components/cruds/Clients/Create.vue'
import ClientsShow from '../components/cruds/Clients/Show.vue'
import ClientsEdit from '../components/cruds/Clients/Edit.vue'
import ProjectsIndex from '../components/cruds/Projects/Index.vue'
import ProjectsCreate from '../components/cruds/Projects/Create.vue'
import ProjectsShow from '../components/cruds/Projects/Show.vue'
import ProjectsEdit from '../components/cruds/Projects/Edit.vue'
import NotesIndex from '../components/cruds/Notes/Index.vue'
import NotesCreate from '../components/cruds/Notes/Create.vue'
import NotesShow from '../components/cruds/Notes/Show.vue'
import NotesEdit from '../components/cruds/Notes/Edit.vue'
import DocumentsIndex from '../components/cruds/Documents/Index.vue'
import DocumentsCreate from '../components/cruds/Documents/Create.vue'
import DocumentsShow from '../components/cruds/Documents/Show.vue'
import DocumentsEdit from '../components/cruds/Documents/Edit.vue'
import TransactionsIndex from '../components/cruds/Transactions/Index.vue'
import TransactionsCreate from '../components/cruds/Transactions/Create.vue'
import TransactionsShow from '../components/cruds/Transactions/Show.vue'
import TransactionsEdit from '../components/cruds/Transactions/Edit.vue'
import CurrenciesIndex from '../components/cruds/Currencies/Index.vue'
import CurrenciesCreate from '../components/cruds/Currencies/Create.vue'
import CurrenciesShow from '../components/cruds/Currencies/Show.vue'
import CurrenciesEdit from '../components/cruds/Currencies/Edit.vue'
import TransactionTypesIndex from '../components/cruds/TransactionTypes/Index.vue'
import TransactionTypesCreate from '../components/cruds/TransactionTypes/Create.vue'
import TransactionTypesShow from '../components/cruds/TransactionTypes/Show.vue'
import TransactionTypesEdit from '../components/cruds/TransactionTypes/Edit.vue'
import IncomeSourcesIndex from '../components/cruds/IncomeSources/Index.vue'
import IncomeSourcesCreate from '../components/cruds/IncomeSources/Create.vue'
import IncomeSourcesShow from '../components/cruds/IncomeSources/Show.vue'
import IncomeSourcesEdit from '../components/cruds/IncomeSources/Edit.vue'
import ClientStatusesIndex from '../components/cruds/ClientStatuses/Index.vue'
import ClientStatusesCreate from '../components/cruds/ClientStatuses/Create.vue'
import ClientStatusesShow from '../components/cruds/ClientStatuses/Show.vue'
import ClientStatusesEdit from '../components/cruds/ClientStatuses/Edit.vue'
import ProjectStatusesIndex from '../components/cruds/ProjectStatuses/Index.vue'
import ProjectStatusesCreate from '../components/cruds/ProjectStatuses/Create.vue'
import ProjectStatusesShow from '../components/cruds/ProjectStatuses/Show.vue'
import ProjectStatusesEdit from '../components/cruds/ProjectStatuses/Edit.vue'
import PermissionsIndex from '../components/cruds/Permissions/Index.vue'
import PermissionsCreate from '../components/cruds/Permissions/Create.vue'
import PermissionsShow from '../components/cruds/Permissions/Show.vue'
import PermissionsEdit from '../components/cruds/Permissions/Edit.vue'
import RolesIndex from '../components/cruds/Roles/Index.vue'
import RolesCreate from '../components/cruds/Roles/Create.vue'
import RolesShow from '../components/cruds/Roles/Show.vue'
import RolesEdit from '../components/cruds/Roles/Edit.vue'
import UsersIndex from '../components/cruds/Users/Index.vue'
import UsersCreate from '../components/cruds/Users/Create.vue'
import UsersShow from '../components/cruds/Users/Show.vue'
import UsersEdit from '../components/cruds/Users/Edit.vue'
import UserActionsIndex from '../components/cruds/UserActions/Index'
import Dashboard from '../components/Dashboard'
import ReportsIndex from '../components/cruds/Reports/Index'

Vue.use(VueRouter)

const routes = [
    { path: '/change-password', component: ChangePassword, name: 'auth.change_password' },
    { path: '/clients', component: ClientsIndex, name: 'clients.index' },
    { path: '/clients/create', component: ClientsCreate, name: 'clients.create' },
    { path: '/clients/:id', component: ClientsShow, name: 'clients.show' },
    { path: '/clients/:id/edit', component: ClientsEdit, name: 'clients.edit' },
    { path: '/projects', component: ProjectsIndex, name: 'projects.index' },
    { path: '/projects/create', component: ProjectsCreate, name: 'projects.create' },
    { path: '/projects/:id', component: ProjectsShow, name: 'projects.show' },
    { path: '/projects/:id/edit', component: ProjectsEdit, name: 'projects.edit' },
    { path: '/notes', component: NotesIndex, name: 'notes.index' },
    { path: '/notes/create', component: NotesCreate, name: 'notes.create' },
    { path: '/notes/:id', component: NotesShow, name: 'notes.show' },
    { path: '/notes/:id/edit', component: NotesEdit, name: 'notes.edit' },
    { path: '/documents', component: DocumentsIndex, name: 'documents.index' },
    { path: '/documents/create', component: DocumentsCreate, name: 'documents.create' },
    { path: '/documents/:id', component: DocumentsShow, name: 'documents.show' },
    { path: '/documents/:id/edit', component: DocumentsEdit, name: 'documents.edit' },
    { path: '/transactions', component: TransactionsIndex, name: 'transactions.index' },
    { path: '/transactions/create', component: TransactionsCreate, name: 'transactions.create' },
    { path: '/transactions/:id', component: TransactionsShow, name: 'transactions.show' },
    { path: '/transactions/:id/edit', component: TransactionsEdit, name: 'transactions.edit' },
    { path: '/currencies', component: CurrenciesIndex, name: 'currencies.index' },
    { path: '/currencies/create', component: CurrenciesCreate, name: 'currencies.create' },
    { path: '/currencies/:id', component: CurrenciesShow, name: 'currencies.show' },
    { path: '/currencies/:id/edit', component: CurrenciesEdit, name: 'currencies.edit' },
    { path: '/transaction-types', component: TransactionTypesIndex, name: 'transaction_types.index' },
    { path: '/transaction-types/create', component: TransactionTypesCreate, name: 'transaction_types.create' },
    { path: '/transaction-types/:id', component: TransactionTypesShow, name: 'transaction_types.show' },
    { path: '/transaction-types/:id/edit', component: TransactionTypesEdit, name: 'transaction_types.edit' },
    { path: '/income-sources', component: IncomeSourcesIndex, name: 'income_sources.index' },
    { path: '/income-sources/create', component: IncomeSourcesCreate, name: 'income_sources.create' },
    { path: '/income-sources/:id', component: IncomeSourcesShow, name: 'income_sources.show' },
    { path: '/income-sources/:id/edit', component: IncomeSourcesEdit, name: 'income_sources.edit' },
    { path: '/client-statuses', component: ClientStatusesIndex, name: 'client_statuses.index' },
    { path: '/client-statuses/create', component: ClientStatusesCreate, name: 'client_statuses.create' },
    { path: '/client-statuses/:id', component: ClientStatusesShow, name: 'client_statuses.show' },
    { path: '/client-statuses/:id/edit', component: ClientStatusesEdit, name: 'client_statuses.edit' },
    { path: '/project-statuses', component: ProjectStatusesIndex, name: 'project_statuses.index' },
    { path: '/project-statuses/create', component: ProjectStatusesCreate, name: 'project_statuses.create' },
    { path: '/project-statuses/:id', component: ProjectStatusesShow, name: 'project_statuses.show' },
    { path: '/project-statuses/:id/edit', component: ProjectStatusesEdit, name: 'project_statuses.edit' },
    { path: '/permissions', component: PermissionsIndex, name: 'permissions.index' },
    { path: '/permissions/create', component: PermissionsCreate, name: 'permissions.create' },
    { path: '/permissions/:id', component: PermissionsShow, name: 'permissions.show' },
    { path: '/permissions/:id/edit', component: PermissionsEdit, name: 'permissions.edit' },
    { path: '/roles', component: RolesIndex, name: 'roles.index' },
    { path: '/roles/create', component: RolesCreate, name: 'roles.create' },
    { path: '/roles/:id', component: RolesShow, name: 'roles.show' },
    { path: '/roles/:id/edit', component: RolesEdit, name: 'roles.edit' },
    { path: '/users', component: UsersIndex, name: 'users.index' },
    { path: '/users/create', component: UsersCreate, name: 'users.create' },
    { path: '/users/:id', component: UsersShow, name: 'users.show' },
    { path: '/users/:id/edit', component: UsersEdit, name: 'users.edit' },
    { path: '/user-actions', component: UserActionsIndex, name: 'user_actions.index' },
    { path: '/reports', component: ReportsIndex, name: 'reports.index' },
    { path: '/home', component: Dashboard, name: 'dashboard' },
]

export default new VueRouter({
    mode: 'history',
    base: '/admin',
    routes
})
