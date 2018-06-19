import Vue from 'vue'
import Vuex from 'vuex'
import Alert from './modules/alert'
import ChangePassword from './modules/change_password'
import Rules from './modules/rules'
import ClientsIndex from './modules/Clients'
import ClientsSingle from './modules/Clients/single'
import ProjectsIndex from './modules/Projects'
import ProjectsSingle from './modules/Projects/single'
import NotesIndex from './modules/Notes'
import NotesSingle from './modules/Notes/single'
import DocumentsIndex from './modules/Documents'
import DocumentsSingle from './modules/Documents/single'
import TransactionsIndex from './modules/Transactions'
import TransactionsSingle from './modules/Transactions/single'
import CurrenciesIndex from './modules/Currencies'
import CurrenciesSingle from './modules/Currencies/single'
import TransactionTypesIndex from './modules/TransactionTypes'
import TransactionTypesSingle from './modules/TransactionTypes/single'
import IncomeSourcesIndex from './modules/IncomeSources'
import IncomeSourcesSingle from './modules/IncomeSources/single'
import ClientStatusesIndex from './modules/ClientStatuses'
import ClientStatusesSingle from './modules/ClientStatuses/single'
import ProjectStatusesIndex from './modules/ProjectStatuses'
import ProjectStatusesSingle from './modules/ProjectStatuses/single'
import PermissionsIndex from './modules/Permissions'
import PermissionsSingle from './modules/Permissions/single'
import RolesIndex from './modules/Roles'
import RolesSingle from './modules/Roles/single'
import UsersIndex from './modules/Users'
import UsersSingle from './modules/Users/single'
import UserActionsIndex from './modules/UserActions'
import ReportsIndex from './modules/Reports/Index'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
    modules: {
        Alert,
        ChangePassword,
        Rules,
        ClientsIndex,
        ClientsSingle,
        ProjectsIndex,
        ProjectsSingle,
        NotesIndex,
        NotesSingle,
        DocumentsIndex,
        DocumentsSingle,
        TransactionsIndex,
        TransactionsSingle,
        CurrenciesIndex,
        CurrenciesSingle,
        TransactionTypesIndex,
        TransactionTypesSingle,
        IncomeSourcesIndex,
        IncomeSourcesSingle,
        ClientStatusesIndex,
        ClientStatusesSingle,
        ProjectStatusesIndex,
        ProjectStatusesSingle,
        PermissionsIndex,
        PermissionsSingle,
        RolesIndex,
        RolesSingle,
        UsersIndex,
        UsersSingle,
        UserActionsIndex,
        ReportsIndex
    },
    strict: debug,
})
