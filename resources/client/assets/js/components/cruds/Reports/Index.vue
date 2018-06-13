<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Reports</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body reports__tools">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm" @click="fetchData">
                                    <i class="fa fa-refresh" :class="{'fa-spin': loading}"></i> Refresh
                                </button>
                            </div>
                            <v-select
                                    v-model="selectedProject"
                                    :options="projects"
                                    label="title"
                                    placeholder="All projects"
                                    class="reports__tools__select"
                            />
                        </div>

                        <div class="box-body">
                            <div class="row" v-if="loading">
                                <div class="col-xs-4 col-xs-offset-4">
                                    <div class="alert text-center">
                                        <i class="fa fa-spin fa-refresh"></i> Loading
                                    </div>
                                </div>
                            </div>

                            <datatable
                                    v-if="!loading"
                                    :columns="columns"
                                    :data="data"
                                    :total="total"
                                    :query="query"
                                    :xprops="xprops"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</template>


<script>
  import { mapGetters, mapActions } from 'vuex'

  export default {
    data() {
      return {
        selectedProject: null,
        columns: [
          { title: 'Month', field: 'date', sortable: true },
          { title: 'Income', field: 'income', sortable: true },
          { title: 'Expenses', field: 'expenses', sortable: true },
          { title: 'Fees', field: 'fees', sortable: true },
          { title: 'Total', field: 'total', sortable: true }
        ],
        query: { sort: 'id', order: 'desc' },
        xprops: {
          module: 'ReportsIndex',
          route: 'reports',
          permission_prefix: 'projects_'
        }
      }
    },
    created() {
      this.$root.relationships = this.relationships
      this.fetchData()
      this.setProjectsQuery({ offset: 0, limit: 9999})
      this.fetchProjects()
    },
    destroyed() {
      this.resetState()
    },
    computed: {
      ...mapGetters('ReportsIndex', ['data', 'total', 'loading', 'relationships']),
      ...mapGetters({
        projects: 'ProjectsIndex/data'
      })
    },
    watch: {
      query: {
        handler(query) {
          this.setQuery(query)
        },
        deep: true
      },

      selectedProject: function(project) {
        if (project && project.id) {
          this.fetchData(project.id)
        }
      }
    },
    methods: {
      ...mapActions('ReportsIndex', ['fetchData', 'setQuery', 'resetState']),
      ...mapActions('ProjectsIndex', {
        fetchProjects: 'fetchData',
        setProjectsQuery: 'setQuery'
      })
    }
  }
</script>


<style scoped>
    .reports__tools {
        display: flex;
    }

    .reports__tools__select {
        margin-left: auto;
        width: 40%;
    }
</style>
