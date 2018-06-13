import { AbilityBuilder } from '@casl/ability'

/**
 * Defines how to detect object's type: https://stalniy.github.io/casl/abilities/2017/07/20/define-abilities.html
 */


function subjectName(item) {
    if (typeof item === 'string') {
        return item
    }

    return 'all'
}

export default AbilityBuilder.define({ subjectName }, can => {
    // code...
})
