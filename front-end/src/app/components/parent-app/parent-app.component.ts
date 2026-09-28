import { Component } from '@angular/core';
import { TableComponent } from '../table/table.component';
import { PaginationComponent } from '../pagination/pagination.component';
import { HeaderComponent } from '../header/header.component';
import { SidebarComponent } from '../sidebar/sidebar.component';
import { HeaderBottomComponent } from '../header-bottom/header-bottom.component';
import { RouterOutlet } from '@angular/router';
import { SigninComponent } from '../signin/signin.component';

@Component({
  selector: 'app-parent-app',
  standalone: true,
  imports: [
    TableComponent,
    PaginationComponent,
    HeaderComponent,
    SidebarComponent,
    HeaderBottomComponent,
    SigninComponent,
    RouterOutlet,
  ],
  templateUrl: './parent-app.component.html',
  styleUrl: './parent-app.component.css',
})
export class ParentAppComponent {
  a = 'dashboardaaaaaaaaaaaa';
  data = [
    { title: 'Title 1', content: 'This is content 1' },
    { title: 'Title 2', content: 'This is content 2' },
    { title: 'Title 3', content: 'This is content 3' },
  ];
}
