/**
 * Note:
 *   * this file is ONLY intended for development usage
 *   * do NOT import this file in other source files
 */
import { startMeasure } from './timing'
import { lstatSync, readdirSync, writeFileSync, existsSync } from 'fs'
import { resolve, join } from 'path'
import { SanProject } from '../../models/san-project'
import ToJSCompiler from '../index'
import debugFactory from 'debug'

const debug = debugFactory('case')
const caseRoot = resolve(__dirname, '../../../test/cases')
const tsConfigFilePath = resolve(__dirname, '../../../test/tsconfig.json')
const cases = readdirSync(caseRoot)
const sanProject = new SanProject({ tsConfigFilePath })

export function compile (caseName) {
    debug('compile', caseName)
    const caseDir = join(caseRoot, caseName)
    if (caseDir) {
        if (!lstatSync(caseDir).isDirectory()) return
    }

    const tsFile = join(caseDir, 'component.ts')
    const jsFile = resolve(caseDir, 'component.js')
    const noTemplateOutput = caseName.indexOf('notpl') > -1
    const targetCode = sanProject.compile(
        existsSync(tsFile) ? tsFile : jsFile,
        ToJSCompiler, {
            noTemplateOutput
        }
    )

    writeFileSync(join(caseDir, 'ssr.js'), targetCode)
}

export function compileAll () {
    const timing = startMeasure()
    for (const caseName of cases) {
        console.log(`compiling ${caseName} to js`)
        compile(caseName)
    }
    console.log('compiled in', timing.duration())
}
