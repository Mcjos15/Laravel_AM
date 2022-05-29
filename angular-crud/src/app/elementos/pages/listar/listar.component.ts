import { AfterViewInit, Component, OnDestroy, OnInit, ViewChild } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Subject } from 'rxjs';
import { ElementosServiceService } from '../../services/elementos-service.service';
declare var $: any;
@Component({
  selector: 'app-listar',
  templateUrl: './listar.component.html',
  styleUrls: ['./listar.component.css']
})
export class ListarComponent implements OnInit, OnDestroy {


  title = 'datatables';
  dtOptions: DataTables.Settings = {};
  dtTrigger: Subject<any> = new Subject<any>();
  posts: any;

  constructor(private elementService:ElementosServiceService) { }

  ngOnInit(): void {
    this.dtOptions = {
      pagingType: 'full_numbers',
      pageLength: 5,
      processing: true,
      lengthMenu: [5, 10, 25]
    };

    this.elementService.getElementos().subscribe(posts => {
        this.posts = posts;
        console.log(this.posts);

        this.dtTrigger.next(void 0);
      });

  }
  ngOnDestroy(): void {
    this.dtTrigger.unsubscribe();
  }


}






export interface PeriodicElement {
  name: string;
  position: number;
  weight: number;
  symbol: string;
}
