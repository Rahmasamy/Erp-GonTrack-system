import { CommonModule } from '@angular/common';
import { Component, Input, OnChanges, SimpleChanges } from '@angular/core';

@Component({
  selector: 'app-table',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './table.component.html',
  styleUrl: './table.component.css',
})
export class TableComponent implements OnChanges {
  // @Input() clints: any = [];
  @Input() data: any = [];
  // @Input() payments: any = [];
  // @Input() employee: any = [];
  // @Input() dailyExpines: any = [];
  constructor() {
    // this.data;
    // console.log(this.data)
  }
  ngOnIt() {
    this.data;
  }
  ngOnChanges(changes: SimpleChanges): void {
    console.log(changes, 'changes');
  }
}
