import { NgModule } from "@angular/core";
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './pages/home/home.component';
import { ListarComponent } from './pages/listar/listar.component';
import { AgregarComponent } from './pages/agregar/agregar.component';
import { ElementoComponent } from './pages/elemento/elemento.component';


const routes: Routes = [
  {
    //Ruta padre
    path: '',
    component: HomeComponent,
    //Rutas hijas
    children: [
      {
        path: 'listado',
        component: ListarComponent
      },
      {
        path: 'agregar',
        component: AgregarComponent
      },
      {
        path: 'editar/:id',
        component: AgregarComponent
      },
      {
        path: ':id',
        component: ElementoComponent
      },
      {
        path: '**',
        redirectTo: 'listado'
      }
    ]
  }
]

@NgModule({
  declarations: [],
  imports: [
    RouterModule.forChild(routes)

  ],
  exports: [
    RouterModule
  ]
})
export class ElementosRoutingModule { }
