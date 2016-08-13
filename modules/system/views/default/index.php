<div class="system-default-index">
    <h1>系统状态</h1>

    <h3>数据库状态</h3>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>标题</th>
                    <th>系统参数</th>
                    <th>值</th>
                    <th style="width: 200px;">历史参数</th>
                    <th>值</th>
                    <th>其他参数</th>
                    <th>值</th>
                    <th style="width: 800px;">备注</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>慢查询</th>
                    <th>慢查询日志开启状态
                        <hr>
                        慢查询超时时间</th>
                    <td><?=$variables['log_slow_queries'] ?>
                        <hr>
                        <?=$variables['slow_launch_time'] ?></td>
                    <th>慢查询条数</th>
                    <td><?=$global_status['Slow_queries'] ?></td>
                    <th></th>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>连接数</th>
                    <th>MySQL服务器最大连接数</th>
                    <td><?=$variables['max_connections'] ?></td>
                    <th>MySQL服务器过去的最大连接数</th>
                    <td><?=$global_status['Max_used_connections'] ?></td>
                    <th>最大连接数占上限连接数</th>
                    <td><?=round( $global_status['Max_used_connections']/$variables['max_connections'] * 100 , 2) . "％" ?></td>
                    <td>MySQL服务器过去的最大连接数如果是245，没有达到服务器连接数上限256，应该没有出现1040错误，比较理想的设置是：Max_used_connections / max_connections * 100% ≈ 85%</td>
                </tr>
                <tr>
                    <th>Key_buffer_size</th>
                    <th>key_buffer_size分配内存</th>
                    <td><?=round($variables['key_buffer_size']/1024/1024, 2)."M" ?></td>
                    <th>索引读取请求数
                        <hr>
                        没有找到直接从硬盘读取索引数</th>
                    <td><?=$global_status['Key_read_requests'] ?>
                        <hr>
                        <?=$global_status['Key_reads'] ?></td>
                    <th>未命中缓存的概率</th>
                    <td><?=round( $global_status['Key_reads']/$global_status['Key_read_requests'] * 100 , 2) . "％" ?></td>
                    <td>key_cache_miss_rate在0.1%以下都很好(每1000个请求有一个直接读硬盘)，如果key_cache_miss_rate在0.01%以下的话，key_buffer_size分配的过多，可以适当减少。</td>
                </tr>
                <tr>
                    <th>Key_buffer_size</th>
                    <th></th>
                    <td></td>
                    <th>未使用的缓存簇(blocks)数
                        <hr>
                        用到的最大的blocks数</th>
                    <td><?=$global_status['Key_blocks_unused'] ?>
                        <hr>
                        <?=$global_status['Key_blocks_used'] ?></td>
                    <th>缓存簇(blocks)使用概率</th>
                    <td><?=round( $global_status['Key_blocks_used']/($global_status['Key_blocks_used'] + $global_status['Key_blocks_unused']) * 100 , 2) . "％" ?></td>
                    <td>Key_blocks_unused表示未使用的缓存簇(blocks)数，Key_blocks_used表示曾经用到的最大的blocks数，比如这台服务器，所有的缓存都用到了，要么增加key_buffer_size，要么就是过渡索引了，把缓存占满了。比较理想的设置：
                        Key_blocks_used / (Key_blocks_unused + Key_blocks_used) * 100% ≈ 80%</td>
                </tr>
                <tr>
                    <th>临时表</th>
                    <th>max_heap_table_size
                        <hr>
                        tmp_table_size</th>
                    <td><?=round($variables['max_heap_table_size']/1024/1024, 2)."M" ?>
                        <hr>
                        <?=round($variables['tmp_table_size']/1024/1024, 2)."M" ?></td>
                    <th>Created_tmp_disk_tables
                        <hr>
                        Created_tmp_files
                        <hr>
                        Created_tmp_tables</th>
                    <td><?=$global_status['Created_tmp_disk_tables'] ?>
                        <hr>
                        <?=$global_status['Created_tmp_files'] ?>
                        <hr>
                        <?=$global_status['Created_tmp_tables'] ?></td>
                    <th>Created_tmp_disk_tables / Created_tmp_tables * 100%</th>
                    <td><?=round( $global_status['Created_tmp_disk_tables']/$global_status['Created_tmp_tables'] * 100 , 2) . "％" ?></td>
                    <td>每次创建临时表，Created_tmp_tables增加，如果是在磁盘上创建临时表，Created_tmp_disk_tables也增加,Created_tmp_files表示MySQL服务创建的临时文件文件数，比较理想的配置是：
                        Created_tmp_disk_tables / Created_tmp_tables * 100% <= 25%</td>
                </tr>
                <tr>
                    <th>Open Table情况</th>
                    <th>表缓存</th>
                    <td><?=$variables['table_open_cache'] ?></td>
                    <th>打开表的数量;打开过的表数量</th>
                    <td><?=$global_status['Open_tables'] ?>;<?=$global_status['Opened_tables']  ?></td>
                    <th>Open_tables / Opened_tables * 100% ; Open_tables / table_open_cache * 100%</th>
                    <td><?=round( $global_status['Open_tables']/$global_status['Opened_tables'] * 100 , 2) . "％" ?>  <?=round( $global_status['Open_tables']/$variables['table_open_cache'] * 100 , 2) . "％" ?></td>
                    <td>比较合适的值为：　Open_tables / Opened_tables * 100% >= 85%;Open_tables / table_cache * 100% <= 95%</td>
                </tr>
                <tr>
                    <th>进程使用情况</th>
                    <th>thread_cache_size</th>
                    <td><?=$variables['thread_cache_size'] ?></td>
                    <th>Threads_cached
                        <hr>
                        Threads_connected
                        <hr>
                        Threads_created
                        <hr>
                        Threads_running</th>
                    <td><?=$global_status['Threads_cached'] ?>
                        <hr>
                        <?=$global_status['Threads_connected'] ?>
                        <hr>
                        <?=$global_status['Threads_created'] ?>
                        <hr>
                        <?=$global_status['Threads_running'] ?></td>
                    <th></th>
                    <td></td>
                    <td>
                        如果我们在MySQL服务器配置文件中设置了thread_cache_size，当客户端断开之后，服务器处理此客户的线程将会缓存起来以响应下一个客户而不是销毁(前提是缓存数未达上限)。Threads_created表示创建过的线程数，如果发现Threads_created值过大的话，表明MySQL服务器一直在创建线程，这也是比较耗资源，可以适当增加配置文件中thread_cache_size值，
                    </td>
                </tr>
                <tr>
                    <th>查询缓存(query cache)</th>
                    <th>查询缓存类型
                        <hr>
                        是否写操作完成再读表
                        <hr>
                        缓存限制大小
                        <hr>
                        缓存块的最小大小
                        <hr>
                        查询缓存大小</th>
                    <td><?=$variables['query_cache_type'] ?>
                        <hr>
                        <?=$variables['query_cache_wlock_invalidate'] ?>
                        <hr>
                        <?=round($variables['query_cache_limit']/1024/1024, 2)."M" ?>
                        <hr>
                        <?=round($variables['query_cache_min_res_unit']/1024, 2)."K" ?>
                        <hr>
                        <?=round($variables['query_cache_size']/1024/1024, 2)."M" ?></td>
                    <th>缓存中相邻内存块的个数
                        <hr>
                        缓存中的空闲内存
                        <hr>
                        Qcache_hits
                        <hr>
                        Qcache_inserts
                        <hr>
                        Qcache_lowmem_prunes
                        <hr>
                        Qcache_not_cached
                        <hr>
                        Qcache_queries_in_cache
                        <hr>
                        Qcache_total_blocks</th>
                    <td><?=$global_status['Qcache_free_blocks'] ?>
                        <hr>
                        <?=round($global_status['Qcache_free_memory']/1024/1024, 2)."M" ?>
                        <hr>
                        <?=$global_status['Qcache_hits'] ?>
                        <hr>
                        <?=$global_status['Qcache_inserts'] ?>
                        <hr>
                        <?=$global_status['Qcache_lowmem_prunes'] ?>
                        <hr>
                        <?=$global_status['Qcache_not_cached'] ?>
                        <hr>
                        <?=$global_status['Qcache_queries_in_cache'] ?>
                        <hr>
                        <?=$global_status['Qcache_total_blocks'] ?></td>
                    <th>
                        查询缓存碎片率
                        <hr>
                        查询缓存利用率
                        <hr>
                        查询缓存命中率
                    </th>
                    <td>
                        <?=round( $global_status['Qcache_free_blocks']/$global_status['Qcache_total_blocks'] * 100 , 2) . "％" ?>
                        <hr>
                        <?=round( ($variables['query_cache_size']-$global_status['Qcache_free_memory'])/$variables['query_cache_size'] * 100 , 2) . "％" ?>
                        <hr>
                        <?=round( ($global_status['Qcache_hits']-$global_status['Qcache_inserts'])/$global_status['Qcache_hits'] * 100 , 2) . "％" ?>
                    </td>
                    <td>
                        Qcache_free_blocks：缓存中相邻内存块的个数。数目大说明可能有碎片。FLUSH QUERY CACHE会对缓存中的碎片进行整理，从而得到一个空闲块。
                        　Qcache_free_memory：缓存中的空闲内存。
                        Qcache_hits：每次查询在缓存中命中时就增大
                        Qcache_inserts：每次插入一个查询时就增大。命中次数除以插入次数就是不中比率。
                        　Qcache_lowmem_prunes：缓存出现内存不足并且必须要进行清理以便为更多查询提供空间的次数。这个数字最好长时间来看;如果这个数字在不断增长，就表示可能碎片非常严重，或者内存很少。(上面的 free_blocks和free_memory可以告诉您属于哪种情况)
                        　Qcache_not_cached：不适合进行缓存的查询的数量，通常是由于这些查询不是 SELECT 语句或者用了now()之类的函数。
                        　Qcache_queries_in_cache：当前缓存的查询(和响应)的数量。
                        Qcache_total_blocks：缓存中块的数量。
                        <hr>
                        query_cache_limit：超过此大小的查询将不缓存
                        　query_cache_min_res_unit：缓存块的最小大小
                        　　query_cache_size：查询缓存大小
                        　query_cache_type：缓存类型，决定缓存什么样的查询，示例中表示不缓存 select sql_no_cache 查询
                        query_cache_wlock_invalidate：当有其他客户端正在对MyISAM表进行写操作时，如果查询在query cache中，是否返回cache结果还是等写操作完成再读表获取结果。
                        query_cache_min_res_unit的配置是一柄”双刃剑”，默认是4KB，设置值大对大数据查询有好处，但如果你的查询都是小数据查询，就容易造成内存碎片和浪费。
                        查询缓存碎片率 = Qcache_free_blocks / Qcache_total_blocks * 100%
                        如果查询缓存碎片率超过20%，可以用FLUSH QUERY CACHE整理缓存碎片，或者试试减小query_cache_min_res_unit，如果你的查询都是小数据量的话。
                        查询缓存利用率 = (query_cache_size - Qcache_free_memory) / query_cache_size * 100%
                        查询缓存利用率在25%以下的话说明query_cache_size设置的过大，可适当减小;查询缓存利用率在80%以上而且Qcache_lowmem_prunes > 50的话说明query_cache_size可能有点小，要不就是碎片太多。
                        查询缓存命中率 = (Qcache_hits - Qcache_inserts) / Qcache_hits * 100%
                        示例服务器 查询缓存碎片率 = 20.46%，查询缓存利用率 = 62.26%，查询缓存命中率 = 1.94%，命中率很差，可能写操作比较频繁吧，而且可能有些碎片。
                    </td>
                </tr>
                <tr>
                    <th>排序使用情况 </th>
                    <th></th>
                    <td></td>
                    <th>
                        Sort_merge_passes
                        <hr>
                        Sort_range
                        <hr>
                        Sort_rows
                        <hr>
                        Sort_scan
                    </th>
                    <td>
                        <?=$global_status['Sort_merge_passes'] ?>
                        <hr>
                        <?=$global_status['Sort_range'] ?>
                        <hr>
                        <?=$global_status['Sort_rows'] ?>
                        <hr>
                        <?=$global_status['Sort_scan'] ?>
                    </td>
                    <th></th>
                    <td></td>
                    <td>
                        Sort_merge_passes 包括两步。MySQL 首先会尝试在内存中做排序，使用的内存大小由系统变量 Sort_buffer_size 决定，如果它的大小不够把所有的记录都读到内存中，MySQL 就会把每次在内存中排序的结果存到临时文件中，等 MySQL 找到所有记录之后，再把临时文件中的记录做一次排序。这再次排序就会增加 Sort_merge_passes。实际上，MySQL 会用另一个临时文件来存再次排序的结果，所以通常会看到 Sort_merge_passes 增加的数值是建临时文件数的两倍。因为用到了临时文件，所以速度可能会比较慢，增加 Sort_buffer_size 会减少 Sort_merge_passes 和 创建临时文件的次数。但盲目的增加 Sort_buffer_size 并不一定能提高速度，见 How fast can you sort data with MySQL?
                    </td>
                </tr>
                <tr>
                    <th>文件打开数</th>
                    <th>open_files_limit</th>
                    <td><?=$variables['open_files_limit'] ?></td>
                    <th>Open_files</th>
                    <td><?=$global_status['Open_files'] ?></td>
                    <th>Open_files / open_files_limit * 100%</th>
                    <td><?=round( $global_status['Open_files']/$variables['open_files_limit'] * 100 , 2) . "％" ?></td>
                    <td>比较合适的设置：Open_files / open_files_limit * 100% <= 75%</td>
                </tr>
                <tr>
                    <th>表锁情况 </th>
                    <th></th>
                    <td></td>
                    <th>
                        Table_locks_immediate
                        <hr>
                        Table_locks_waited
                    </th>
                    <td>
                        <?=$global_status['Table_locks_immediate'] ?>
                        <hr>
                        <?=$global_status['Table_locks_waited'] ?>
                    </td>
                    <th></th>
                    <td></td>
                    <td>Table_locks_immediate表示立即释放表锁数，Table_locks_waited表示需要等待的表锁数，如果Table_locks_immediate / Table_locks_waited > 5000，最好采用InnoDB引擎，因为InnoDB是行锁而MyISAM是表锁，对于高并发写入的应用InnoDB效果会好些。示例中的服务器Table_locks_immediate / Table_locks_waited = 235，MyISAM就足够了。</td>
                </tr>
                <tr>
                    <th>表扫描情况 </th>
                    <th></th>
                    <td></td>
                    <th>
                        Handler_read_first
                        <hr>
                        Handler_read_key
                        <hr>
                        Handler_read_next
                        <hr>
                        Handler_read_prev
                        <hr>
                        Handler_read_rnd
                        <hr>
                        Handler_read_rnd_next
                        <hr>
                        Com_select
                    </th>
                    <td>
                        <?=$global_status['Handler_read_first'] ?>
                        <hr>
                        <?=$global_status['Handler_read_key'] ?>
                        <hr>
                        <?=$global_status['Handler_read_next'] ?>
                        <hr>
                        <?=$global_status['Handler_read_prev'] ?>
                        <hr>
                        <?=$global_status['Handler_read_rnd'] ?>
                        <hr>
                        <?=$global_status['Handler_read_rnd_next'] ?>
                        <hr>
                        <?=$global_status['Com_select'] ?>
                    </td>
                    <th>表扫描率</th>
                    <td><?=$global_status['Handler_read_rnd_next']/$global_status['Com_select'] ?></td>
                    <td>计算表扫描率：
                        　表扫描率 = Handler_read_rnd_next / Com_select
                        　如果表扫描率超过4000，说明进行了太多表扫描，很有可能索引没有建好，增加read_buffer_size值会有一些好处，但最好不要超过8MB。</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
