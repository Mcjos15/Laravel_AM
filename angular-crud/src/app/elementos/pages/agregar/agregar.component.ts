import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { switchMap } from 'rxjs';
import { Elemento } from '../../interfaces/elementos.interface';
import { ElementosServiceService } from '../../services/elementos-service.service';

@Component({
  selector: 'app-agregar',
  templateUrl: './agregar.component.html'
})
export class AgregarComponent implements OnInit {

  elemento: Elemento = {
    nombre: '',
    peso: 0.0,
    simbolo: ''
  };
  posts: Posts = {

    title: '',
    body: ''
  };
  constructor(private elementosService: ElementosServiceService,
    private activatedRoute: ActivatedRoute) { }

  ngOnInit(): void {

    //esto carga los datos del objeto que se va a editar, pero se ocupan los datos del backend
    this.activatedRoute.params
      .pipe(
        switchMap(({ id }) => this.elementosService.getElementosId(id))
      )
      .subscribe(elemento => this.elemento = elemento)
  }

  guardar() {

    console.log(this.posts.id);
    if (this.elemento.id) {
      //se actualzia
    } else {
      //se crea
    }
  }

}

export interface Posts {
  userId?: number;
  id?: number;
  title: string;
  body: string;
}

