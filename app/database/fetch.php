<?php
//Query builden


$query = [];

function read(string $table, string $fields = '*')
{
	global $query;

	$query = []; 

	$query['read'] = true;
	$query['execute'] = [];

	$query['sql'] = "select {$fields} from {$table}";
}


function limit(string|int $limit){

	global $query;

	if (isset($query['paginate'])) {
		throw new Exception('O limit não pode ser chamado com a paginação');		
}

	$query['limit'] = true;

	$query['sql'] = "{$query['sql']} limit {$limit}";


}


function order(string $by, string $order = 'asc'){

	global $query;

	if (isset($query['limit'])) {
		throw new Exception('O order não pode vir depois do limit');		
	}

	if (isset($query['paginate'])) {
		throw new Exception('O order não pode vir depois da paginação');		
}

	$query['sql'] = "{$query['sql']} order by {$by} {$order}";
}


function paginate(string|int $parPage = 10){
	
	global $query;

	if (isset($query['limit'])) {
		throw new Exception('A paginação não deve ser chamada com o limit');		
	}	

	$query['paginate'] = true;
}


function where()
{
	global $query;

	$args = func_get_args();
	$nunArgs = func_num_args();

	if (!isset($query['read'])) {
		throw new Exception('Antes de chamar o where chame o read');
	}	

	if ($nunArgs < 2 || $nunArgs > 3) {
		throw new Exception('O where precisa ter 2 ou 3 parametros!');
	}

	if ($nunArgs === 2) {
		$field = $args[0];
		$operator = '=';
		$value = $args[1];
	}

	if ($nunArgs === 3) {
		$field = $args[0];
		$operator = $args[1];
		$value = $args[2];
	}	

	$query['where'] = true;
	$query['execute'] = array_merge($query['execute'], [$field => $value]);
	$query['sql'] = "{$query['sql']} where {$field} {$operator} :{$field}";
}

/*
function where(string $field, string $operator, string|int $value)
{
	global $query;

	if (!isset($query['read'])) {
		throw new Exception('Antes de chamar o where chame o read');
	}	

	if (func_num_args() != 3) {
		throw new Exception('O where precisa exatamente de 3 parametros!');
	}

	$query['where'] = true;
	$query['execute'] = array_merge($query['execute'], [$field => $value]);
	$query['sql'] = "{$query['sql']} where {$field} {$operator} :{$field}";
}
*/

function orWhere()
{
	global $query;

	$args = func_get_args();
	$nunArgs = func_num_args();

	if (!isset($query['read'])) {
		throw new Exception('Antes de chamar o where chame o read');
	}

	if (!isset($query['where'])) {
		throw new Exception('Antes de chamar o orWhere chame o where');
	}		

	if ($nunArgs < 2 || $nunArgs > 4) {
		throw new Exception('O where precisa de 3 até 4 parametros!');
	}


	$data = match($nunArgs) {
	
	2 => whereThreeParameters($args),
	3 => whereThoParameters($args),
	4 => $args,
};

	[$field, $operator, $value, $typeWhere] = $data;

	$query['where'] = true;
	$query['execute'] = array_merge($query['execute'], [$field => $value]);
	$query['sql'] = "{$query['sql']} {$typeWhere} {$field} {$operator} :{$field}";
}

function whereThoParameters(array $args):array{

	$field = $args[0];
	$operator = '=';
	$value = $args[1];
	$typeWhere = 'or';

	return [$field, $operator, $value, $typeWhere];	

}


function whereThreeParameters(array $args):array{

	$operators = ['=', '<', '>', '!==', '<=', '>='];
	$field = $args[0];
	$operator = in_array($args[1], $operators) ? $args[1] : '=';
	$value = in_array($args[1], $operators) ? $args[2] : $args[1];
	$typeWhere = $args[2] === 'and' ? 'and' : 'or';

		return [$field, $operator, $value, $typeWhere];	

}

/*
function orWhere(string $field, string $operator, string|int $value, string $typeWhere ='or')
{
	global $query;

	if (!isset($query['read'])) {
		throw new Exception('Antes de chamar o where chame o read');
	}

	if (!isset($query['where'])) {
		throw new Exception('Antes de chamar o orWhere chame o where');
	}		

	if (func_num_args() < 3 or func_num_args() > 4) {
		throw new Exception('O where precisa de 3 ou 4 parametros!');
	}

	$query['where'] = true;
	$query['execute'] = array_merge($query['execute'], [$field => $value]);
	$query['sql'] = "{$query['sql']} {$typeWhere} {$field} {$operator} :{$field}";
}
*/

function search(array $search){
	
	global $query;

	if (isset($query['where'])) {
		throw new Exception('Não pode chamar o where na busca');
	}

	if (!arrayIsAssociative($search)) {
		throw new Exception('Na busca o array tem que ser associativo');
	}

	$sql = "{$query['sql']} where ";

	$execute = [];
	foreach ($search as $field => $searshed) {
		$sql.= "{$field} like :{$field} or ";
		$execute[$field] = "%{$searshed}%";
	}

	$sql = rtrim($sql, ' or ');

	$query['sql'] = $sql;
	$query['execute'] = $execute;
}


function execute(bool $isFetchAll = true, bool $rowCount = false)
{
	global $query;

	try {

	$connect = connect();
	if (!isset($query['sql'])) {
		throw new Exception('Precisar ter o sql para executar a query');
	}

	$prepare = $connect->prepare($query['sql']);
	$prepare->execute($query['execute'] ?? []);
	
	if ($rowCount) {
		return $prepare->rowCount();
	}

	return $isFetchAll ? $prepare->fetchAll() : $prepare->fetch();

		} catch (Exception $e) {

			$error = [
				'file' 		=> $e->getFile(),
				'line' 		=> $e->getLine(),
				'message' 	=> $e->getMessage(),
				'sql'		=> $query['sql']
			];
		echo '<pre>';
		debug($error);
		echo '</pre>';		
	}
}


//Query completa
function all($table, $fields = '*'){
	try{
		$connect = connect();

		$query = $connect->query("select {$fields} from {$table}");
		return $query->fetchAll();

	}catch (PDOException $e) {
		var_dump($e->getMessage());
	}
}

function descTable($table, $fields = 'id_question'){
	try{
		$connect = connect();

		$query = $connect->query("select {$fields} from {$table} ORDER BY $fields DESC");
		return $query->fetchAll();

	}catch (PDOException $e) {
		var_dump($e->getMessage());
	}
}


function findBy($table, $field, $value, $fields = '*'){
	try{
		$connect = connect();
		$prepare = $connect->prepare("select {$fields} from {$table} where {$field} = :{$field}");
		$prepare->execute([
			$field => $value
		]);
		return $prepare->fetch();
	}catch(PDOException $e){
	var_dump($e->getMessage());
	}

}