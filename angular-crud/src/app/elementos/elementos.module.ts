import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AgregarComponent } from './pages/agregar/agregar.component';
import { ListarComponent } from './pages/listar/listar.component';
import { ElementoComponent } from './pages/elemento/elemento.component';
import { ElementosRoutingModule } from './elementos-routing.module';
import { MaterialModule } from '../material/material.module';
import { HomeComponent } from './pages/home/home.component';
import {DataTablesModule} from 'angular-datatables';
import { FlexLayoutModule } from '@angular/flex-layout';

@NgModule({
  declarations: [
    AgregarComponent,
    ListarComponent,
    ElementoComponent,
    HomeComponent
  ],
  imports: [
    CommonModule,
    ElementosRoutingModule,
    MaterialModule,
    DataTablesModule,
    FlexLayoutModule
  ]
})
export class ElementosModule { }
