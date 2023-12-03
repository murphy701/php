# php
## supply magagement service web site using php
## source code by https://www.youtube.com/watch?v=qZSf98TyRHE
# 추가할 예정인 기능- 글과 댓글 작성할 수 있는 게시판, bo에 상품 추가하는 기능, 회원가입 기능
  
(ADD CONSTRAINT `back_order_list_ibfk_3` FOREIGN KEY (`receiving_id`) REFERENCES `receiving_list` (`id`) ON DELETE CASCADE;)-> db구조 상 foriegn key 삭제 예정  
  
->alter table back_order_list drop foreign key back_order_list_ibfk_3;  
  
back order list 구조  
supplier_id=supplier_list의 id와 동일  
po_id=purchase_order_list의 id와 동일  
receiving_id=receiving_list의 id와 동일**  
  
bo_items 구조  
item_id=item_list의 id와 동일  
bo_id=back_order_list의 id와 동일  
  
item_list의 구조  
supplier_id=supplier_list의 id와 동일  
  
po_items의 구조  
po_id=purchase_order_list의 id와 동일  
item_id=item_list의 id와 동일  
  
purchase_order_list 구조  
supplier_id=supplier_list의 id와 동일  
  
return_list 구조  
supplier_id=supplier_list의 id와 동일  
  
stock_list 구조  
item_id=item_list의 id와 동일  
  
create table board(  
num int not null auto_increment,  
id char(15) not null,//(username으로 바꿀 수도 있음)  
subject char(200) not null,  
content text not null,  
regist_day char(20) not null,  
hit int not null,  
primary key(num)  
);  
