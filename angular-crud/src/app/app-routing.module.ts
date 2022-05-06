import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: '',
    loadChildren: () => import('./elementos/elementos.module').then(m => m.ElementosModule)
  }
];

@NgModule({
  //Sólo se tiene un forRoot en apoicación, los demas son for child, ya que así se usa
  // la carga lazy
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
